<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Document</title>
</head>
<body style='margin-top:2%'>
<div class="container">
    <form action="">

        <table class="table table table-striped table-bordered table-hover Column content" >
            <div style="margin-bottom:20px;">
                <a href="{{url('media_index')}}?type=" class="btn btn-primary">全部</a>
                <a href="{{url('media_index')}}?type=image" class="btn btn-success">图片</a>
                <a href="{{url('media_index')}}?type=video" class="btn btn-info">视频</a>
                <a href="{{url('media_index')}}?type=voice" class="btn btn-warning">音频</a>

            </div>


            <hr/>
            <tr>
                <td>素材名称</td>
                <td>素材展示</td>
                <td>素材类型</td>
                <td>临时/永久</td>
                <td>素材添加时间</td>
                <td>操作</td>
            </tr>
        @foreach($info as $v)
            <tr>
                <td> {{$v->m_name}}</td>
                <td>
                    @if($v->m_format =='video')
                        <video src="{{$v->m_path}}" controls="controls" width="100px">  </video>
                    @elseif($v->m_format =='image')
                        <img src="{{$v->m_path}}"   width="60px" alt="">
                    @elseif($v->m_format =='voice')
                        <audio src="{{$v->m_path}}" controls="controls" width="100px">  </audio>
                    @endif
                </td>

                <td>

                    @if($v->m_format =='video')
                        视频
                    @elseif($v->m_format =='image')
                        图片
                    @elseif($v->m_format =='voice')
                      音频
                    @endif

                </td>
                <td>
                   @if($v->m_type =='temporary')
                        临时素材
                    @elseif($v->m_format =='voice')
                       永久素材
                    @endif  
                </td>
                <td>{{date('Y-m-d H:i:s',$v->m_addtime)}}</td>
                <td><a href="{{url('media_delete')}}?m_id={{$v->m_id}}" class="btn btn-danger">删除</a></td>
            </tr>

         @endforeach
        </table>

    </form>
</div>
</body>
</html>