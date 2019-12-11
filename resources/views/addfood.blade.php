@extends('layouts.myapp')

@section('content')
<section class="content">
    
    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif


    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Food</h2>
            <div class="card-tools">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fiModal" data-action="Create" >Add Food</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Food Id</th>
                        <th>Food Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Description</th>
                        <th>Serves</th>
                        <th>Contents</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($food as $fi)
                    <tr>
                        <td>{{ $fi->id }}</td>
                        <td>{{ $fi->food_name }}</td>
                        <td>{{ $fi->category }}</td>
                        <td>{{ $fi->price }}</td>
                        <td>{{ $fi->quantity }}</td>
                        <td>{{ $fi->description }}</td>
                        <td>{{ $fi->serves }}</td>
                        <td>{{ $fi->contents }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fiModal" data-action="Show" data-fi="{{$fi}}">
                                    <i class="fa fa-search" data-toggle="tooltip"></i>
                                </a>
                                <a href="#" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#fiModal" data-action="Edit" data-fi="{{$fi}}">
                                    <i class="fa fa-edit" data-toggle="tooltip"></i>
                                </a>
                                <form class="form-inline" method="post" action="addfood/{{$fi->id}}" 
                                onsubmit="return confirm('Are You Sure You Want to Delete the Food?')">
                                @csrf
                                @method('DELETE')
                                    <input type="hidden" name="_method" value="delete">
                                    <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                                    
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!--New Food Modal Window -->
    <div class="modal fade" id="fiModal" tableindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Food Items</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="foodForm" role="form" method="post">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <input type="hidden" class="form-control" id="actionType" name="actionType">
                        <div class="form-group">
                            <label for="id">Food Id: </label>
                            <input type="hidden" class="form-control" id="id" name="id">
                            <span class="text-danger"><strong id="fino"></strong></span>
                        </div> 
                        <div class="form-group">
                            <label for="food_name">Food Name: </label>
                            <input type="text" class="form-control" id="food_name" name="food_name">
                            <span class="text-danger"><strong id="food_name-error"></strong></span>
                        </div>
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select class="form-control" id="category" name="category">
                                <option value="Snacks">Snacks</option>
                                <option value="Beverages">Beverages</option>
                                <option value="Breakfast">Breakfast</option>
                                <option value="Chinese">Chinese</option>
                            </select> 
                            <span class="text-danger"><strong id="category-error"></strong></span>
                        </div>
                        <div class="form-group">
                            <label for="price">Price: </label>
                            <input type="text" class="form-control" id="price" name="price">
                            <span class="text-danger"><strong id="price-error"></strong></span>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="text" class="form-control" id="quantity" name="quantity">
                            <span class="text-danger"><strong id="quantity-error"></strong></span>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input type="text" class="form-control" id="description" name="description">
                            <span class="text-danger"><strong id="description-error"></strong></span>
                        </div>
                        <div class="form-group">
                            <label for="serves">Serves:</label>
                            <input type="text" class="form-control" id="serves" name="serves">
                            <span class="text-danger"><strong id="serves-error"></strong></span>
                        </div>
                        <div class="form-group">
                            <label for="contents">Contents:</label>
                            <input type="text" class="form-control" id="contents" name="contents">
                            <span class="text-danger"><strong id="contents-error"></strong></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="submitForm">Save</button>
                    </div>
                </form>    
            </div>    
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    $('#fiModal').on('show.bs.modal',function(e){
        var actionButton = $(e.relatedTarget)
        var actionType = actionButton.data('action')
        var id = document.getElementById("id")
        var food_name =  document.getElementById("food_name")
        var price =  document.getElementById("price")  
        var category =  document.getElementById("category")           
        var quantity =  document.getElementById("quantity")
        var description =  document.getElementById("description")
        var serves =  document.getElementById("serves")
        var contents =  document.getElementById("contents")
       
        $('#fino').html("");
        $('#food_name-error').html("");
        $('#category-error').html("");
        $('#price-error').html("");
        $('#quantity-error').html("");
        $('#description-error').html("");
        $('#serves-error').html("");
        $('#contents-error').html("");
       
        var modal = $(this)
        modal.find('.modal-title').text(actionType + ' Food')
        submitForm.style.display="block"
        document.getElementById("actionType").value=actionType

        if(actionType == 'Edit' ||actionType =='Show'){
            var fi = actionButton.data('fi')
            id.value = fi.id
            food_name.value = fi.food_name
            category.value = fi.category
            price.value = fi.price
            quantity.value = fi.quantity
            description.value = fi.description
            serves.value = fi.serves
            contents.value = fi.contents
           
           
            $('#fino').html(fi.id)
        }
        else{
            id.value = null;
            document.getElementById('foodForm').reset()
        }
        if(actionType =='Show'){
            submitForm.style.display="none"
        }

    })

    $('body').on('click','#submitForm', function(e){
        e.preventDefault();
        var foodForm = $("#foodForm");
        var formData = foodForm.serialize();
        $('#food_name-error').html("");
        $('#category-error').html("");
        $('#price-error').html("");
        $('#quantity-error').html("");
        $('#description-error').html("");
        $('#serves-error').html("");
        $('#contents-error').html("");
        let base_url = window.location;
        $.ajax({
            url:'/addfood',
            type:'POST',
            data:formData,
            success: function(data){
                console.log(data);
                $('#fiModal').modal('hide');
                window.location.href="/addfood";
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log(jqXHR.status);
                data=jqXHR.responseJSON;
                console.log(data);
                if(data.errors){
                    if(data.errors.food_name){
                        $('#food_name-error').html(data.errors.food_name[0]);
                    }
                    if(data.errors.category){
                        $('#category-error').html(data.errors.category[0]);
                    }
                    if(data.errors.price){
                        $('#price-error').html(data.errors.price[0]);
                    }
                    if(data.errors.quantity){
                        $('#quantity-error').html(data.errors.quantity[0]);
                    }
                    if(data.errors.description){
                        $('#description-error').html(data.errors.description[0]);
                    }
                    if(data.errors.serves){
                        $('#serves-error').html(data.errors.serves[0]);
                    }
                    if(data.errors.contents){
                        $('#contents-error').html(data.errors.contents[0]);
                    }
                   
                }
            }

        });
    });
</script>
@endsection
