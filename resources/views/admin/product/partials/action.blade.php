<button class="btn btn-info btn-sm dropdown-toggle btn-flat" data-toggle="dropdown" aria-expanded="false">More</button>
<div class="dropdown-menu">
    <a href="" class="dropdown-item">Edit</a>
    <div class="dropdown-divider"></div>
    <a href="#" class="dropdown-item" onclick="">Remove</a>
    <form action="" method="post" id="">
        @method('DELETE')
        @csrf
    </form>
</div>
