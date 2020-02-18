<?php
namespace App\Model;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Key;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\ValidationData;
use Lcobucci\JWT\Parser;
class JwtAuth 
{	
  
  //声明个类  class 类名{}
  //类实例化-就是对象
  //打印对象，会输出类的属性值

	private static $instance; //静态的类的实例 --只是个变量名
	//static  是个静态变量 会一直存在，实例化类的时候不会释放变量，其他数据一旦被实例，值会被释放。
	private $iss = "www.1812.com";  //签发人
	private $aud  = "1812.app";  //受众
	private $jti  = "4f1g23a12aa";  //编号
	private $secret  = "gjiodgiaofjiadsojfiaojiofj-9-a9-0dasf0-adfa";  //秘钥
	private $decodeToken;
	private $token;
	private $uid;

	public static function getInstance()
	{	
		if(is_null(Self::$instance)){
			return Self::$instance = new Self();
		}
		return Self::$instance;
	}

	private function __construct()
	{

	}

	private function __clone()
	{

	}

	/**
	 * 获取token
	 * @return [type] [description]
	 */
	public  function getToken()
	{
		
		return $this->token;
	}

	/**
	 * 生成jwt编码
	 * @return [type] [description]
	 */
	public  function encode()
	{
		$time = time();
		$signer = new Sha256();
		$this->token = (new Builder())->issuedBy($this->iss) // Configures the issuer (iss claim)
		                        ->permittedFor($this->aud) // Configures the audience (aud claim)
		                        ->identifiedBy($this->jti, true) // Configures the id (jti claim), replicating as a header item
		                        ->issuedAt($time) // Configures the time that the token was issue (iat claim)
		                        ->canOnlyBeUsedAfter($time + 60) // Configures the time that the token can be used (nbf claim)
		                        ->expiresAt($time + 3600) // Configures the expiration time of the token (exp claim)
		                        ->withClaim('uid', 1) // Configures a new claim, called "uid"
		                        ->getToken($signer, new Key($this->secret)); // Retrieves the generated token
		return $this;
	}



	//解密jwt
	public function decode()
	{
		if(!$this->decodeToken){
			$this->decodeToken = (new Parser())->parse((string) $this->token);
		}

        // $this->getClaim();
		// $this->uid = $this->decodeToken->getClaim('uid');
		// $decodeToken = (new Parser())->parse((string) $this->token);
		// echo $decodeToken->getHeader('jti');
		// echo $decodeToken->getClaim('iss');
		// echo $decodeToken->getClaim('uid');
		 return $this->decodeToken;
	}




	//验证jwt字符
	public function valid()
	{
		$data = new ValidationData();
		$data->setIssuer($this->iss);
		$data->setAudience($this->aud);
		$data->setId($this->jti);
		$data->setCurrentTime(time() + 61);
		return $this->decode()->validate($data);

	}

	//验证签名
	public function checkSign()
	{
		$signer = new Sha256();
		return $this->decode()->verify($signer,$this->secret);
	}

	public function getUid()
	{
		return $this->uid;
	}

	public  function setToken($token)
	{
       $this->token = $token;
       return $this;
	}
}