<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.css" />
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="navbar-brand" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="navbar-brand" href="#">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="navbar-brand" href="#">Contact us</a>
                        </li>
                        <li class="nav-item">
                            <a class="navbar-brand" href="#">FeedBack</a>
                        </li>
                    </ul>
                    <div class="d-flex" role="search">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ $user_infos->name }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-start">
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
        </nav>
        <div class="mt-5">
            <div class="container-fluid">
                <div class="card" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                    <div class="card-body">
                        <h3 class="text-center">Welcome to our website</h3>
                        <div class="mt-4">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-home" type="button" role="tab"
                                        aria-controls="nav-home" aria-selected="true">All Books</button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-profile" type="button" role="tab"
                                        aria-controls="nav-profile" aria-selected="false">Issued Book</button>
                                    {{-- <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-contact" type="button" role="tab"
                                        aria-controls="nav-contact" aria-selected="false">Studen List</button> --}}
                                    {{-- <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-contact" type="button" role="tab"
                                        aria-controls="nav-contact" aria-selected="false">Remove Books</button> --}}
                                </div>
                            </nav>

                            <div class="tab-content mt-2" id="nav-tabContent">
                                {{-- all books --}}
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab" tabindex="0">
                                    <button class="btn btn-primary mt-1" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Add books</button>



                                    <!--add books Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Book
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form class="add_books" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="container text-center">
                                                            <div class="row row-cols-2">
                                                                <div class="col-12">
                                                                    <div class="input-group mb-3">
                                                                        <input class="form-control" name="file"
                                                                            type="file" id="formFile">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="title" id="title"
                                                                            placeholder="title" aria-label="Username"
                                                                            aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="author" id="author"
                                                                            placeholder="author" aria-label="Username"
                                                                            aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="isbn" id="isbn"
                                                                            placeholder="isbn" aria-label="Username"
                                                                            aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="publisher" id="publisher"
                                                                            placeholder="publisher"
                                                                            aria-label="Username"
                                                                            aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="year_publish" id="year_publish"
                                                                            placeholder="year publish"
                                                                            aria-label="Username"
                                                                            aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="category" id="category"
                                                                            placeholder="category"
                                                                            aria-label="Username"
                                                                            aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" class="form-control"
                                                                            name="quantity" id="quantity"
                                                                            placeholder="quantity"
                                                                            aria-label="Username"
                                                                            aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end add books Modal -->



                                    <table class="table table-success table-hover table-striped-columns display"
                                        id="myTable">
                                        <thead class="table-danger">
                                            <tr>
                                                <th scope="col" style="text-align: center">S.no</th>
                                                <th scope="col" style="text-align: center">Images</th>
                                                <th scope="col" style="text-align: center">Title</th>
                                                <th scope="col" style="text-align: center">author</th>
                                                <th scope="col" style="text-align: center">isbn</th>
                                                <th scope="col" style="text-align: center">publisher</th>
                                                <th scope="col" style="text-align: center">year_published</th>
                                                <th scope="col" style="text-align: center">category</th>
                                                <th scope="col" style="text-align: center">quantity</th>
                                                <th scope="col" style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $serial_num = 1;
                                            @endphp
                                            @foreach ($all_books as $all_book)
                                                <tr>
                                                    <th scope="row">{{ $serial_num++ }}</th>
                                                    <td style="text-align: center"><img
                                                            src="{{ asset('storage/images/' . $all_book->images) }}"
                                                            style="width:70px" alt=""></td>
                                                    <td style="text-align: center">{{ $all_book->title }}</td>
                                                    <td style="text-align: center">{{ $all_book->author }}</td>
                                                    <td style="text-align: center">{{ $all_book->isbn }}</td>
                                                    <td style="text-align: center">{{ $all_book->publisher }}</td>
                                                    <td style="text-align: center">{{ $all_book->year_published }}</td>
                                                    <td style="text-align: center">{{ $all_book->category }}</td>
                                                    <td style="text-align: center">{{ $all_book->quantity }}</td>
                                                    <td style="text-align: center">
                                                        {{-- Edit --}}
                                                        <button type="button" class="btn btn-warning"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#{{ $all_book->book_id }}">Edit</button>

                                                        {{-- delete --}}
                                                        <button type="button"
                                                            onclick="delete_books({{ $all_book->book_id }})"
                                                            class="btn btn-danger">Delete</button>
                                                    </td>
                                                </tr>
                                                <!-- Modal -->
                                                <div class="modal fade" id="{{ $all_book->book_id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">

                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    Edit Books</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <form class="uploadForm" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="container text-center">
                                                                        <input type="hidden" name="book_id"
                                                                            id="book_id"
                                                                            value="{{ $all_book->book_id }}">
                                                                        <div class="row row-cols-2">
                                                                            <div class="col-12">
                                                                                <div class="input-group mb-3">
                                                                                    <input class="form-control"
                                                                                        name="file" type="file"
                                                                                        id="formFile">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text"
                                                                                        value="{{ $all_book->title }}"
                                                                                        class="form-control"
                                                                                        name="title" id="title"
                                                                                        placeholder="title"
                                                                                        aria-label="Username"
                                                                                        aria-describedby="basic-addon1">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text"
                                                                                        value="{{ $all_book->author }}"
                                                                                        class="form-control"
                                                                                        name="author" id="author"
                                                                                        placeholder="author"
                                                                                        aria-label="Username"
                                                                                        aria-describedby="basic-addon1">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text"
                                                                                        value="{{ $all_book->isbn }}"
                                                                                        class="form-control"
                                                                                        name="isbn" id="isbn"
                                                                                        placeholder="isbn"
                                                                                        aria-label="Username"
                                                                                        aria-describedby="basic-addon1">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text"
                                                                                        value="{{ $all_book->publisher }}"
                                                                                        class="form-control"
                                                                                        name="publisher"
                                                                                        id="publisher"
                                                                                        placeholder="publisher"
                                                                                        aria-label="Username"
                                                                                        aria-describedby="basic-addon1">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text"
                                                                                        value="{{ $all_book->year_published }}"
                                                                                        class="form-control"
                                                                                        name="year_publish"
                                                                                        id="year_publish"
                                                                                        placeholder="year publish"
                                                                                        aria-label="Username"
                                                                                        aria-describedby="basic-addon1">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text"
                                                                                        value="{{ $all_book->category }}"
                                                                                        class="form-control"
                                                                                        name="category" id="category"
                                                                                        placeholder="category"
                                                                                        aria-label="Username"
                                                                                        aria-describedby="basic-addon1">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="input-group mb-3">
                                                                                    <input type="text"
                                                                                        value="{{ $all_book->quantity }}"
                                                                                        class="form-control"
                                                                                        name="quantity" id="quantity"
                                                                                        placeholder="quantity"
                                                                                        aria-label="Username"
                                                                                        aria-describedby="basic-addon1">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end Modal -->
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>



                                {{-- issued books --}}
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                    aria-labelledby="nav-profile-tab" tabindex="0">
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#issueBook">
                                        Issue new book
                                    </button>


                                    {{-- issue book  modal --}}
                                    <div class="modal fade" id="issueBook" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Issue New Book
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row row-cols-2">
                                                        <div class="col-6">
                                                            <div class=" mb-3">
                                                                <label for="title" class="form-label">Student
                                                                    List</label>
                                                                <select class="form-select" id="Student_Name"
                                                                    aria-label="Default select example">
                                                                    <option selected>Select Student Name</option>
                                                                    @foreach ($get_student_details as $student_list)
                                                                        <option
                                                                            value="{{ $student_list->student_id }}">
                                                                            {{ $student_list->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class=" mb-3">
                                                                <label for="title" class="form-label">Book
                                                                    List</label>
                                                                <select class="form-select" id="Book_Name"
                                                                    aria-label="Default select example">
                                                                    <option selected>Select Book Name</option>
                                                                    @foreach ($all_books as $all_books_list)
                                                                        <option
                                                                            value="{{ $all_books_list->book_id }}">
                                                                            {{ $all_books_list->title }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="title" class="form-label">Issued
                                                                    Date</label>
                                                                <input type="date" class="form-control"
                                                                    name="due_date" id="add_issue_date">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" onclick="add_new_issued_book()"
                                                        class="btn btn-primary">Save
                                                        changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end issue book  modal --}}

                                    <table class="table table-primary table-hover" id="issueTable">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="text-align: center">S.no</th>
                                                <th scope="col" style="text-align: center">student Name</th>
                                                <th scope="col" style="text-align: center">email</th>
                                                <th scope="col" style="text-align: center">phone_number</th>
                                                <th scope="col" style="text-align: center">address</th>
                                                <th scope="col" style="text-align: center">registration_date</th>
                                                <th scope="col" style="text-align: center">book name</th>
                                                {{-- <th scope="col" style="text-align: center">book images</th> --}}
                                                <th scope="col" style="text-align: center">Issue Date</th>
                                                <th scope="col" style="text-align: center">Due Date</th>
                                                <th scope="col" style="text-align: center">Return Date</th>
                                                <th scope="col" style="text-align: center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $sNo = 1;
                                            @endphp
                                            @foreach ($issued_books as $issued_book)
                                                {{-- @php
                                                    echo "<pre>";print_r($issued_book);
                                                @endphp --}}
                                                <tr>
                                                    <th scope="row">{{ $sNo++ }}</th>
                                                    <td style="text-align: center">{{ $issued_book->name }}</td>
                                                    <td style="text-align: center">{{ $issued_book->email }}</td>
                                                    <td style="text-align: center">{{ $issued_book->phone_number }}
                                                    </td>
                                                    <td style="text-align: center">{{ $issued_book->address }}</td>
                                                    <td style="text-align: center">
                                                        {{ $issued_book->registration_date }}</td>
                                                    <td style="text-align: center">{{ $issued_book->title }}</td>
                                                    {{-- <td style="text-align: center"><img
                                                            src="{{ $issued_book->images }}" style="width:70px"
                                                            alt=""></td> --}}
                                                    <td style="text-align: center">{{ $issued_book->issue_date }}</td>
                                                    <td style="text-align: center">{{ $issued_book->due_date }}</td>
                                                    <td style="text-align: center">{{ $issued_book->return_date }}
                                                    </td>
                                                    <td style="text-align: center">
                                                        {{-- Edit --}}
                                                        <button type="button" class="btn btn-warning"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#edit_issue_{{ $issued_book->issue_id }}"><i
                                                                class="bi bi-pen-fill"></i></button>
                                                    </td>
                                                </tr>


                                                <!--edit issue book Modal -->
                                                <div class="modal fade" id="edit_issue_{{ $issued_book->issue_id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel_edit"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5"
                                                                    id="exampleModalLabel_edit">Edit Issued book</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="container text-center">
                                                                    <input type="hidden" name="book_id"
                                                                        id="book_id"
                                                                        value="{{ $issued_book->book_id }}">
                                                                    <div class="row row-cols-2">
                                                                        <div class="col-12">
                                                                            <div class="input-group mb-3">
                                                                                <label class="input-group-text"
                                                                                    for="books_options">Select
                                                                                    Book</label>
                                                                                <select class="form-select"
                                                                                    id="books_options{{ $issued_book->issue_id }}">
                                                                                    {{-- <option selected>Choose...</option> --}}
                                                                                    @foreach ($all_books as $issued_all_book)
                                                                                        <option
                                                                                            value="{{ $issued_all_book->book_id }}"
                                                                                            {{ $issued_all_book->book_id == $issued_book->book_id ? 'selected' : '' }}>
                                                                                            {{ $issued_all_book->title }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="input-group mb-3">
                                                                                <input type="date"
                                                                                    value="{{ $issued_book->due_date ?? old('due_date') }}"
                                                                                    class="form-control"
                                                                                    name="due_date"
                                                                                    id="edit_due_date{{ $issued_book->issue_id }}"
                                                                                    placeholder="edit_due_date"
                                                                                    aria-label="Username"
                                                                                    aria-describedby="basic-addon1">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <div class="input-group mb-3">
                                                                                <input type="date"
                                                                                    value="{{ $issued_book->return_date ?? old('return_date') }}"
                                                                                    class="form-control"
                                                                                    name="return_date"
                                                                                    id="return_date{{ $issued_book->issue_id }}"
                                                                                    placeholder="return_date"
                                                                                    aria-label="Username"
                                                                                    aria-describedby="basic-addon1">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary"
                                                                    onclick="edit_issued_books({{ $issued_book->issue_id }})">Save
                                                                    changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $('#issueTable').DataTable();
        });


        //add books
        $('.add_books').on('submit', function(event) {
            event.preventDefault();

            var formData = new FormData(this);
            console.log(formData);

            $.ajax({
                url: '/add_book',
                type: 'POST',
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.status == "success" && data.message ==
                        "your books is addedd successfully") {
                        Swal.fire({
                            icon: "success",
                            title: "Your Book is add successfully",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000);
                    } else if (data.status == "failed") {
                        Swal.fire({
                            icon: "warning",
                            title: "Something went wrong please try again latter",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });


        //edit books
        $('.uploadForm').on('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: '/edit_book',
                type: 'POST',
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.status == "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Your Book is updated successfully",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000);
                    } else if (data.status == "failed") {
                        Swal.fire({
                            icon: "warning",
                            title: "Something went wrong please try again latter",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });


        //delete books
        function delete_books(val) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/delete_book',
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            book_id: val
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            if (data.status == "success") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Your Book is deleted successfully",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                setTimeout(() => {
                                    window.location.reload();
                                }, 2000);
                            } else if (data.status == "failed") {
                                Swal.fire({
                                    icon: "warning",
                                    title: "Something went wrong please try again latter",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                        }
                    })
                }
            });
        }


        //edit issued books
        function edit_issued_books(val) {
            $.ajax({
                type: 'POST',
                url: '/edit_issued_books',
                data: {
                    _token: "{{ csrf_token() }}",
                    book_id: val,
                    book_name: $("#books_options" + val).val(),
                    due_date: $("#edit_due_date" + val).val(),
                    return_date: $("#return_date" + val).val(),
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.status == "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Your Book is updated successfully",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000);
                    } else if (data.status == "failed") {
                        Swal.fire({
                            icon: "warning",
                            title: "Something went wrong please try again latter",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000);
                    }
                }
            });
        }


        //add new issued book
        function add_new_issued_book() {
            console.log($("#Student_Name").val());
            console.log($("#Book_Name").val());
            console.log($("#add_issue_date").val());

            $.ajax({
                type: 'POST',
                url: '/add_new_issued_book',
                data: {
                    _token: "{{ csrf_token() }}",
                    student_name: $("#Student_Name").val(),
                    book_name: $("#Book_Name").val(),
                    issue_date: $("#add_issue_date").val(),
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.status == "success") {
                        Swal.fire({
                            icon: "success",
                            title: "Your Book is issued successfully",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        // setTimeout(() => {
                        //     window.location.reload();
                        // }, 2000);
                    } else if (data.status == "failed") {
                        Swal.fire({
                            icon: "warning",
                            title: "Something went wrong please try again latter",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        // setTimeout(() => {
                        //     window.location.reload();
                        // }, 2000);
                    }
                }
            })
        }

        //logout
        function logout(){
            $.ajax({
                type: 'POST',
                url: '/logout',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                // success: function(data) {
                //     if (data.status == "success") {
                //         Swal.fire({
                //             icon: "success",
                //             title: "You have logged out successfully",
                //             showConfirmButton: false,
                //             timer: 1500
                //         });
                //         setTimeout(() => {
                //             window.location.href = "/";
                //         }, 2000);
                //     } else if (data.status == "failed") {
                //         Swal.fire({
                //             icon: "warning",
                //             title: "Something went wrong please try again latter",
                //             showConfirmButton: false,
                //             timer: 1500
                //         });
                //     }
                // }
            })
        }
    </script>
</body>

</html>
