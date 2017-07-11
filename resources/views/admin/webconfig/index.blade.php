 @extends('admin.base')


@section('content')
<!-- Content Header (Page header) -->
     <section class="content-header">
          <h1>
            信息输出表
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="{{ url("admin/webconfig") }}">基础配置管理</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 基础配置管理</h3>
                  
                    <button class="btn btn-sm btn-primary" onclick="window.location='{{URL('admin/webconfig/create')}}'">添加配置</button>
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">id号</th>
                      <th>网站名</th>
                      <th>电话</th>
                      <th>logo</th>
                      <th>备案号</th>
                      <th>地址</th>
                      <th>版权</th>
                      <th>添加时间</th>
                      <th style="width: 170px">操作</th>
                    </tr>
                    @foreach($list as $vo) 
                        <tr>
                            <td>{{ $vo->id }}</td>
                            <td>{{ $vo->name }}</td>
                            <td>{{ $vo->phone }}</td>
                            <td><img width="80px" src="{{env('QINIU_DOMAIN')}}{{$vo->logo}}"></td>
                            <td>{{ $vo->recode_number }}</td>
                            <td>{{ $vo->address }}</td>
                            <td>{{ $vo->copyright }}</td>
                            <td>{{ $vo->addtime }}</td>
                            <td>
                                <button class="btn btn-xs btn-danger" onclick="doDel({{ $vo->id }})">删除</button> 
                                <button class="btn btn-xs btn-primary" onclick="window.location='{{URL('/admin/webconfig')}}/{{ $vo->id }}/edit'">编辑</button>
                            </td>
                        </tr>
                    @endforeach
                    
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  {!! $list->render() !!}
                </div>
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
        </section><!-- /.content -->
        
    @endsection
    
    @section('myscript')
    <form action="/users/" method="post" name="myform" style="display:none;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="_method" value="delete"/>
           
    </form>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">New message</h4>
          </div>
          <div class="modal-body">
           <!-- 在此处填充 -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="button" onclick="saveRole()" class="btn btn-primary">保存</button>
          </div>
        </div>
      </div>
    </div> 
    <script type="text/javascript">
        function doDel(id){
            Modal.confirm({msg: "是否删除信息？"}).on(function(e){
                if(e){
                   var form = document.myform;
                    form.action = "{{URL('/admin/webconfig')}}/"+id;
                    form.submit(); 
                }
              });
        }
    </script>
    @endsection 