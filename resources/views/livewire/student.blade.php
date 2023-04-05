<div class="banner">
    <section>
        <div class="banner2"><br><br>
        <div id="data"></div><br><br>
        @if($action == 'list')
        <button  style="width:auto;"type="button" wire:click="create">Add New Data</button><br><br>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Class</th>
                        <th>Roll Number</th>
                        <th>Gender</th>
                        <th>Image</th>
                        <th>Date of birth</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $key => $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->class }}</td>
                            <td>{{ $student->rollnumber }}</td>
                            <td>{{ $student->gender }}</td>
                            <td> <img src="{{ asset('storage/'.$student->image) }}" width="100px"></td>
                            <td>{{ $student->dob }}</td>
                            <td><button id="edit" wire:click="edit({{$student->id}})">Edit</button></td>
                            <td><button id="delete" wire:click="delete({{$student->id}})">Delete</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table><br><br>
            @endif
            @if($action == 'creates')
            <form action="" wire:submit.prevent="store({{$dataId}})">
                <label for="">Name</label>
                <input type="text" wire:model="name"><br>

                <label for="">email</label>
                <input type="email" wire:model="email"><br>

                <label for="">class</label>
                <input type="number" wire:model="class"><br>

                <label for="">Rollnumber</label>
                <input type="number" wire:model="rollnumber"><br>

                <label for="m">Male</label>
                <input type="radio" name="genader" id="m" wire:model="gender" style="width:auto;"><br>

                <label for="f">Female</label>
                <input type="radio" name="genader" id="f" wire:model="gender" style="width:auto;"><br>

                <label for="">Image</label>
                <input type="file" wire:model="image"><br>

                <label for="">Date Of Birth</label>
                <input type="date" wire:model="dob"><br>

                <input type="submit">
            </form>
            @endif
        </div>
    </section>
</div>

