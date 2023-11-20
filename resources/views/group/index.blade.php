@extends('layouts.master')

@section('title', 'Create Group')

@section('contents')
    <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Group</h4>
                <p class="card-description">
                    Create a new group
                </p>
{{--                <form class="forms-sample" action="{{ route('group.store') }}" method="post">--}}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" rows="10" id="description"></textarea>
                    </div>

                    <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            Active
                        </label>
                    </div>
                    @sessionToken
                    <button onclick="saveGroup()" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
{{--                </form>--}}
            </div>
        </div>
    </div><div class="col-md-7 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Groups</h4>
                <p class="card-description">
                    Add class <code>.table</code>
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($groups as $group)
                            <tr>
                                <td>{{ $group->name }}</td>
                                <td>{{ $group->description }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function saveGroup() {
            axios.post('/groups', {
                firstName: 'Fred',
                lastName: 'Flintstone'
            })
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    </script>

@endpush
