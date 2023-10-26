@include('includes.header')

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                @if(session('message'))
                                    <div class="alert alert-success">{{session('message')}}</div>
                                @endif
                                <h4 class="card-title">Alışlar</h4>

                                    <a href="{{route('incomes.create')}}" class="btn btn-primary">+</a>
                                    <a href="" class="btn btn-primary edit_form" style="margin-right: 15px" >Edit</a>
                                    <form action="" method="post" style="display: inline-block" class="delete_form">
                                        {{ method_field('DELETE') }}
                                        @csrf
                                        <button type="submit" disabled class="btn btn-danger">Delete</button>
                                    </form>

                                <br>
                                <br>

                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>

                                                <th>Seç</th>
                                                <th>№</th>
                                                <th>Müəssisə</th>
                                                <th>Anbar adı</th>
                                                <th>Tarix</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($incomes as $income)
                                            <tr>

                                                <td><input type="radio" class="radio_input" name="check" data-edit="{{route('incomes.edit',$income->id)}}" data-delete="{{route('incomes.destroy', $income->id)}}"></td>
                                                <td>{{$income->income_number}}</td>
                                                <td>{{$income->company}}</td>
                                                <td>{{$income->warehouse_name}}</td>
                                                <td>{{$income->date}}</td>

                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



@include('includes.footer')
