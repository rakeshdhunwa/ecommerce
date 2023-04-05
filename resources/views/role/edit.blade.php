@extends('layout.admin')
@section('section_data')
    <div class="banner">
        <section>
            <div class="banner2"><br><br>
            <div id="data"></div><br><br>
            <h2 style="font-size:40px;">Manage Role</h2>
            <button id="buttons"><a href="">Add New Role</a></button>
           
            <form action="{{ route('role.update', $roles->id) }}" method="post">
                    @method('PUT')
                    @csrf
                        <label for="">Name</label>
                            
                        <input type="text" name="name" value="{{ $roles->name }}">
                        <span class="text-danger">
                            @error('name')
                                {{$message}};
                            @enderror
                        </span>
                        <label for="">Permission Name</label>
                            
                        @foreach($permissions as $permission) 
                            <div>
                                <input type="checkbox" id="<?=$permission->name?>" name="permissions[]" value="<?=$permission->name?>" {{($roles->hasPermissionTo($permission->name))?'checked':''}}>
                                <label for="<?=$permission->name?>"><?=$permission->name?></label>
                            </div>  
                        @endforeach                   
                        @error('guard_name')
                            {{$message}};
                        @enderror
                                
                        <button id="submit1" name="submit" value ="submit">Submit</button>
            </form>
            </div>
        </section>
    </div>
@endsection