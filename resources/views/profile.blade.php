@extends('layouts.template')
@section('title','Profile')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="text-center">~Your Profile~</h1>
  </div>
</div>
    <div class="container">
    <table class="table table-striped table-bordered table-hover">
        <tbody class='details'>
        <tr>
            <td>Name :
            <td>{{ $prof->name }}</td>
            </tr>
            <tr>
            <td>Email :</td>
            <td>{{ $prof->email }}</td>
            </tr>
            <tr>
            <td>Phone :</td>
            <td>{{ $prof->phone }}</td>
            </tr>
            <tr>
            <td>Address :</td>
            <td>{{ $prof->address }}</td>
        </tr>
        </tbody>
    </table>
    <div class='buttons'>
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#profModal" data-action="Edit" data-prof="{{$prof}}">
        Edit Profile
    </a>
    <a href="{{ route('order.index') }}" class='btn btn-primary'>View Orders History</a>
    <a href="{{ route('userlogout') }}" class='btn btn-danger'>Logout</a>
    </div>
</div>
    <!-- New Food Modal Window -->
    <div class="modal fade" id="profModal" tableindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Your Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <tr aria-hidden="true">&times;</tr>
                    </button>
                </div>
                <form id="profForm" role="form" method="post" action="{{route('users.update',$prof) }}">
                <input type="hidden" name="_method" value="put">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" class="form-control" id="actionType">
                        <div class="form-group">
                            <label for="id">Id: </label>
                            <input type="hidden" class="form-control" id="id" name="id">
                            <tr class="text-danger"><strong id="profno"></strong></tr>
                        </div> 
                        <div class="form-group">
                            <label for="name">Name: </label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                            <tr class="text-danger"><strong id="phone-error"></strong></tr>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone: </label>
                            <input type="phone" class="form-control" id="phone" name="phone">
                            <tr class="text-danger"><strong id="phone-error"></strong></tr>
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" id="address" name="address">
                            <tr class="text-danger"><strong id="address-error"></strong></tr>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="submitForm">Save</button>
                    </div>
                </form>    
            </div>    
        </div>
    </div>
    
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $('#profModal').on('show.bs.modal',function(e){
        var actionButton = $(e.relatedTarget)
        var actionType = actionButton.data('action')
        var id = document.getElementById("id")
        var name =  document.getElementById("name")
        var email =  document.getElementById("email") 
        var password = document.getElementById("password") 
        var phone =  document.getElementById("phone")           
        var address =  document.getElementById("address")
       
        $('#profno').html("");
        $('#name-error').html("");
        $('#email-error').html("");
        $('#password-error').html("");
        $('#phone-error').html("");
        $('#address-error').html("");
       
        var modal = $(this)
        modal.find('.modal-title').text(actionType + ' Details')
        submitForm.style.display="block"
        document.getElementById("actionType").value=actionType

        if(actionType == 'Edit' ||actionType =='Show'){
            var prof = actionButton.data('prof')
            id.value = prof.id
            name.value = prof.name
            email.value = prof.email
            password.value=prof.password
            phone.value = prof.phone
            address.value = prof.address
           
           
            $('#profno').html(prof.id)
        }
        else{
            id.value = null;
            document.getElementById('profForm').reset()
        }
        if(actionType =='Show'){
            submitForm.style.display="none"
        }

    })
</script>
@endsection