@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">
        Categories
        <span class="btn-sm float-right"><a href="{{route('categories.create')}}" class="btn btn-success">ADD CATEGORIES</a></span>
    </div>
    <div class="card-body">
        @if($categories->count()>0)
        <table class="table">
            <thead>
                <th>NAME</th>
                <th>POSTS COUNT</th>
                <th></th>
            </thead>

            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>
                        {{$category->name}}
                    </td>
                    <td>
                      {{ $category->posts->count()}}
                    </td>
                    <td>
                            <button class="btn btn-danger btn-sm float-right mr-2" onclick="handleDelete({{ $category->id }})" >Delete</button>
                 <a href="{{route('categories.edit',$category->id)}}" class="btn btn-info btn-sm float-right mr-2" >Edit</a>
                
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @else
        <h3 class="text-center">No Categories Yet</h3>

        @endif

        
          <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <form action="" method="POST" id="deleteCategoryForm">
                @csrf
                @method('DELETE')
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p class="text-center text-bold">
                   Are you sure you want to delete this category..??
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
   var form = document.getElementById('deleteCategoryForm')
   form.action='./categories/' +id
$('#deleteModal').modal('show')
 }

</script>

@endsection