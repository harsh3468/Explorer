@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">
        tags
        <span class="btn-sm float-right"><a href="{{route('tags.create')}}" class="btn btn-success">ADD tags</a></span>
    </div>
    <div class="card-body">
        @if($tags->count()>0)
        <table class="table">
            <thead>
                <th>NAME</th>
                <th>POSTS COUNT</th>
                <th></th>
            </thead>

            <tbody>
                @foreach($tags as $tag)
                <tr>
                    <td>
                        {{$tag->name}}
                    </td>
                    <td>
                      {{$tag->posts->count()}}
                    </td>
                    <td>
                            <button class="btn btn-danger btn-sm float-right mr-2" onclick="handleDelete({{ $tag->id }})" >Delete</button>
                 <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-info btn-sm float-right mr-2" >Edit</a>
                
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @else
        <h3 class="text-center">No tags Yet</h3>

        @endif

        
          <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <form action="" method="POST" id="deletetagForm">
                @csrf
                @method('DELETE')
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteModalLabel">Delete tag</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p class="text-center text-bold">
                   Are you sure you want to delete this tag..??
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">NO , Go Back</button>
                  <button type="submit" class="btn btn-danger">Yes, Delete</button>
                </div>
              </div>
              </form>
            
            </div>
          </div>
        
    </div>
</div>


@endsection
@section('script')

<script>
 function handleDelete(id){
   var form = document.getElementById('deletetagForm')
   form.action='./tags/' +id
$('#deleteModal').modal('show')
 }

</script>

@endsection