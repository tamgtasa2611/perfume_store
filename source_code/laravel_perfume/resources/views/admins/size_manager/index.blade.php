@vite(["resources/sass/app.scss", "resources/js/app.js"])
<title>Sizes Manager</title>
<body style="background-color: #303036">
<div id="content" class="">
    <div class="wrapper d-flex align-items-stretch">
        <div style="width: 520px"></div>
        <div class="position-fixed rounded-left" style="height: 100%">
            @include('layouts/navbar_adminMenu')
        </div>

        <!--  content  -->

        <div class="content-container mt-5 ">
            <div class="d-flex mx-auto mt-5">
                <h1 class="me-sm-5 text-white">Size list</h1>
                <nav style="width: 520px"></nav>

                <form class="d-flex search-form mb-0" action="{{route('size.index')}}">
                    <div class="input-group input-group-sm">
                        <input class="form-control" name="search" type="text" placeholder="Type to search...">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <section>
                <div class="h-100">
                    <div class="d-flex align-items-center h-100">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 row-gap-xxl-5">
                                    <div class="card bg-dark">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table
                                                    class="table table-borderless table-dark text-white mb-0 text-center table-striped align-middle">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">SIZE NAME</th>
                                                        <th scope="col">ACTION</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if($sizes->count() > 0)
                                                        @foreach ($sizes as $size)
                                                            <tr style="background-color: #000000">
                                                                <td> {{$size->id}} </td>
                                                                <td> {{$size->size_name}} </td>

                                                                <td class="d-flex justify-content-center pt-2">
                                                                    <div>
                                                                        <button type="button" class="btn btn-primary">
                                                                            <a href="{{route('size.edit', $size) }}"
                                                                               class="text-white nav-link bi-pencil"
                                                                               style="text-decoration: none">Edit</a>
                                                                        </button>
                                                                    </div>
                                                                    <div>
                                                                        <button
                                                                            class="text-white btn bg-danger border-danger-subtle"
                                                                            data-bs-toggle="modal" wire:click="setDeleteId({{$size->id}})"
                                                                            data-bs-target="#deleteModal">
                                                                            Delete
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>


                                                            <!--                              end modal-->
                                                        @endforeach
                                                    @else
                                                    </tbody>
                                                </table>
                                                <p class="text-white text-center fs-3 mt-5 ">
                                                    No Sizes found!
                                                </p>
                                                @endif
                                                <div style="display: flex" class="justify-content-between">
                                                    <button type="button"
                                                            class="btn btn-primary nice-box-shadow h-75 mt-3">
                                                        <a href="{{route('size.create')}}" class="text-white"
                                                           style="text-decoration: none">Add a size</a>
                                                    </button>
                                                    <div class="pt-3">
                                                        {{$sizes->onEachSide(3)->links()}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
{{--        Delete Modal--}}
{{--        Modal--}}
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Size ?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Close</button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this size??
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            <form method="post" action="{{route('size.destroy', $size)}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger border-danger-subtle">Yes, Delete!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    @push('script')
        <script>
            window.addEventListener('hide:delete-modal', function () {
                $('#deleteModal').modal('hide');
            });
        </script>
    @endpush
    <script src="//unpkg.com/alpinejs" defer></script>
</div>

</body>

<x-flash-message/>


