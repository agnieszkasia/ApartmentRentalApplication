@extends('layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="cards shadow">
            <div class="cards-header ">
                <div>DODAJ OPINIĘ O UŻYTKOWNIKU</div>
            </div>
            <div class="card-body">
                <form action="/reviews/{{$user->id}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="invisible">
                        <label for="User_About" class="col-3 mt-4">Treść opinii</label>
                    <input id="User_About" type="number" name="User_About" value="{{$user->id}}">
                        <label for="User_From" class="col-3 mt-4">Treść opinii</label>
                    <input id="User_From" type="number" name="User_From" value="{{auth()->user()->id}}">
                    </div>

                    <div class="row justify-content">
                        <div class="col-12 row">
                            <label for="Content_Of_Review" class="col-3 mt-4">Treść opinii</label>
                            <input id="Content_Of_Review" type="text" class="col-9 mt-3 form-control " name="Content_Of_Review" >
                        </div>
                        <div class="col-6 row">
                            <label for="Number_Of_Stars" class="col-6 mt-4">Ocena</label>
                            <input id="Number_Of_Stars" type="number" value="0" class="col-6 mt-3 form-control " name="Number_Of_Stars" >
                        </div>
                    </div>
                    <button class="mt-4 float-right btn btn-primary">Dodaj</button>
                </form>

            </div>
        </div>


    </div>
@endsection

