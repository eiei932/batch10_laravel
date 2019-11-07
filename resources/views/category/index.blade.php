@extends('template')

@section('content')
<div class="container my-lg-5">
<table border="1" cellspacing="0" cellpadding="10" class="text-center">
	<thead>
		<tr>
			<th>No</th>
			<th>Name</th>
			<th colspan="2">Actions</th>
		</tr>
	</thead>
	<tbody>
		
			@foreach($categories as $row)
			<tr>
            <td>{{$row->id}}</td>
            <td>{{$row->name}}</td>
            <td><a href="{{route('category.edit',$row->id)}}" class="btn btn-primary">Edit</a></td>		       
            <td>
            	<form method="post" action="	{{route('category.destroy',$row->id)}}">
		          @csrf
		          @method('DELETE')
		          <input type="submit" name="delete" onclick="return confirm('Are you sure to delete!)" value="Delete" class="btn btn-danger">
		        </form>
		    </td>
            </tr>
        @endforeach
		
	</tbody>
</table>
</div>
@endsection