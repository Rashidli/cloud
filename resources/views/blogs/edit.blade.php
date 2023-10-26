@include('includes.header')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <form action="{{route('blogs.update', $blog->id)}}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{$blog->act_number}}</h4>
                        <div class="row">
                            <div class="col-6">

                                <div class="mb-3">
                                    <label class="col-form-label">Başlıq az</label>
                                    <input class="form-control" type="text" name="az_title" value="{{$blog->translate('az')->title}}">
                                    @if($errors->first('az_title')) <small class="form-text text-danger">{{$errors->first('az_title')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Başlıq en</label>
                                    <input class="form-control" type="text" name="en_title" value="{{$blog->translate('en')->title}}">
                                    @if($errors->first('en_title')) <small class="form-text text-danger">{{$errors->first('en_title')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Başlıq ru</label>
                                    <input class="form-control" type="text" name="ru_title" value="{{$blog->translate('ru')->title}}">
                                    @if($errors->first('ru_title')) <small class="form-text text-danger">{{$errors->first('ru_title')}}</small> @endif
                                </div>




                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="col-form-label">Mətn az</label>
                                    <textarea class="form-control" type="text" name="az_content" >{{$blog->translate('az')->content}}</textarea>
                                    @if($errors->first('az_content')) <small class="form-text text-danger">{{$errors->first('az_content')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Mətn en</label>
                                    <textarea class="form-control" type="text" name="en_content" >{{$blog->translate('en')->content}}</textarea>
                                    @if($errors->first('en_content')) <small class="form-text text-danger">{{$errors->first('en_content')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Mətn ru</label>
                                    <textarea class="form-control" type="text" name="ru_content">{{$blog->translate('ru')->content}}</textarea>
                                    @if($errors->first('ru_content')) <small class="form-text text-danger">{{$errors->first('ru_content')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <img style="width: 100px; height: 100px;" src="{{$blog->image}}" class="uploaded_image" alt="{{$blog->image}}">
                                    <div class="form-group">
                                        <label >Image</label>
                                        <input type="file" name="image" class="form-control" >
                                    </div>
                                    @if($errors->first('image')) <small class="form-text text-danger">{{$errors->first('image')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Active</label>
                                    <select name="is_active" id="" class="form-control">
                                        <option value="1" {{$blog->is_active == true ? 'selected' : ''}}>Active</option>
                                        <option value="0" {{$blog->is_active == false ? 'selected' : ''}}>Deactive</option>
                                    </select>
                                </div>

                                <div class="mb-3">

                                    <button class="btn btn-primary">Yadda saxla</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@include('includes.footer')
