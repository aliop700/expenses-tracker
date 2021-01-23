@extends('layouts.main')

@section('title','User Index')

@section('content')
<div class="modal" id="create_cat_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <input type="text" class="form-control mt-2" id="cat_title" placeholder="Category Title">
        <input type="text" class="form-control mt-2" id="cat_desc" placeholder="Category Description">
        <select  class="form-control mt-2" id="cat_type">
            @foreach($categories_types as $type)
                <option value="{{$type->id}}"> {{$type->title}} </option>
            @endforeach
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" id="save_cat" class="btn btn-primary">Save changes</button>
        <button type="button" id="close_cat_modal" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="create_transaction_modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create Transaction</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <input type="text" class="form-control mt-2" id="trans_title" placeholder="Category Title">
        <input type="text" class="form-control mt-2" id="trans_desc" placeholder="Category Description">
        <input type="number" class="form-control mt-2" id="trans_amount" placeholder="Category Amount">
        
        <select  class="form-control mt-2" id="trans_cat">
            @foreach($categories as $category)
                <option value="{{$category->id}}"> {{$category->title}} </option>
            @endforeach
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" id="save_trans" class="btn btn-primary">Save changes</button>
        <button type="button" id="close_trans_modal" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<a href="{{route('logout')}}" class="btn btn-primary">Logout</a>
<a href="" id="create_cat" class="btn btn-primary">Create Category</a>

<table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Type</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($categories as $category)
    <tr>
        <td>{{$category->title}}</td>
        <td>{{$category->type->title}}</td>
        <td>{!! $category->buttons()->edit() !!} | {!! $category->buttons()->delete() !!}</td>
    </tr>
  @endforeach
  </tbody>
</table>
<a href="" id="create_trans" class="btn btn-primary">Create Transaction</a>

<table class="table mt-2">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Type</th>
      <th scope="col">Description</th>
      <th scope="col">Amount</th>
      <th scope="col">Created at</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     @foreach($transactions as $transaction)
      <tr>
        <td>{{$transaction->title}}</td>
        <td>{{$transaction->category->title}}</td>
        <td>{{$transaction->description}}</td>
        <td>{{$transaction->amount}}</td>
        <td>{{$transaction->created_at}}</td>
      </tr>
     @endforeach
    </tr>
  </tbody>
</table>
@endsection;

@section('js')
<script>
    $('#create_cat').click(function(e){
        e.preventDefault();
        $('#create_cat_modal').modal('show');
    });

    $('#save_cat').click(function(){

        var title = $('#cat_title').val();
        var desc = $('#cat_desc').val();
        var type = $('#cat_type').val();
        var _token = "{{csrf_token()}}";
        
        var data = {
            title : title,
            description : desc,
            categories_types_id : type,
            _token : _token
        };
        
        $.post("{{route('category.create')}}",data,function(resp){
            window.location.reload();
        })
        
    });

    $('#create_trans').click(function(e){
        e.preventDefault();
        $('#create_transaction_modal').modal('show');
    });
    $('#save_trans').click(function(){
      
      var title = $('#trans_title').val();
      var desc = $('#trans_desc').val();
      var amount = $('#trans_amount').val();
      var cat = $('#trans_cat').val();
      var _token = "{{csrf_token()}}";
      
      var data = {
          title : title , 
          description : desc,
          amount : amount,
          category_id : cat , 
          _token : _token
      };
      $.post("{{route('transactions.create')}}", data, function(){
        window.location.reload();
      });
    });
</script>
@endsection