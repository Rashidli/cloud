@include('includes.header')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <form action="{{route('faqs.update', $faq->id)}}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{$faq->title}}</h4>
                        <div class="row">
                            <div class="col-6">

                                <div class="mb-3">
                                    <label class="col-form-label">Başlıq az</label>
                                    <input class="form-control" type="text" name="az_title" value="{{$faq->translate('az')->title}}">
                                    @if($errors->first('az_title')) <small class="form-text text-danger">{{$errors->first('az_title')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Başlıq en</label>
                                    <input class="form-control" type="text" name="en_title" value="{{$faq->translate('en')->title}}">
                                    @if($errors->first('en_title')) <small class="form-text text-danger">{{$errors->first('en_title')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Başlıq ru</label>
                                    <input class="form-control" type="text" name="ru_title" value="{{$faq->translate('ru')->title}}">
                                    @if($errors->first('ru_title')) <small class="form-text text-danger">{{$errors->first('ru_title')}}</small> @endif
                                </div>




                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="col-form-label">Mətn az</label>
                                    <textarea class="form-control" type="text" name="az_content" >{{$faq->translate('az')->content}}</textarea>
                                    @if($errors->first('az_content')) <small class="form-text text-danger">{{$errors->first('az_content')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Mətn en</label>
                                    <textarea class="form-control" type="text" name="en_content" >{{$faq->translate('en')->content}}</textarea>
                                    @if($errors->first('en_content')) <small class="form-text text-danger">{{$errors->first('en_content')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Mətn ru</label>
                                    <textarea class="form-control" type="text" name="ru_content">{{$faq->translate('ru')->content}}</textarea>
                                    @if($errors->first('ru_content')) <small class="form-text text-danger">{{$errors->first('ru_content')}}</small> @endif
                                </div>


                                <div class="mb-3">
                                    <label class="col-form-label">Active</label>
                                    <select name="is_active" id="" class="form-control">
                                        <option value="1" {{$faq->is_active == true ? 'selected' : ''}}>Active</option>
                                        <option value="0" {{$faq->is_active == false ? 'selected' : ''}}>Deactive</option>
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
