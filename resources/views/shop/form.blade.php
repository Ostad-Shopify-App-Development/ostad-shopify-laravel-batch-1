@extends('layouts.master')

@section('title', 'Form Demo')

@section('contents')
    <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Group</h4>
                <p class="card-description">
                    Create a new group
                </p>
                <form class="forms-sample" action="{{ route('shop.post') }}" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" rows="10" id="description"></textarea>
                    </div>
                    @sessionToken
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                    <button type="button" onclick="checkAuth()" class="btn btn-light">Axios Check</button>


                </form>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        function checkAuth(e) {
            //stop form submit
            console.log("checking")
            axios.get('/check')
                .then(function(response) {
                    console.log(response.data);
                })
                .catch(function(error) {
                    console.log(error);
                });
            return false;
        }
    </script>
@endpush
