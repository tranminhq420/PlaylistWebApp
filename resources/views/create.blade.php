<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- JS and Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <title>Playlist</title>
</head>

<body>
    <div class="container mt-4">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                Add a song name:
            </div>
            <div class="card-body">

                <form name="create" id="create" method="POST" action="">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="" name="name" class="form-control" required="">
                        <label for="artist">Artist</label>
                        <input type="text" name="artist" class="form-control" required="">
                        <label for="link">Link</label>
                        <input type="text" name="link" class="form-control" required="">
                    </div>
                    <button type="button" class="btn btn-primary" onclick="saveSong()">
                        Add a song
                    </button>
                    <button type="button" class="btn btn-primary" onclick="searchSong()">
                        Search by song name
                    </button>
                    <button type="button" class="btn btn-primary" onclick="searchArtist()">
                        Search by artist
                    </button>
                </form>
            </div>
        </div>
    </div>


    @if (@isset($songs))
        @foreach ($songs as $song)
            <iframe style="border-radius:12px" src="{{ $song->link }}" height="152" width="300" frameBorder="0"
                allowtransparency="true" allow="encrypted-media; picture-in-picture" loading="lazy"></iframe>
            {{ $song->name }} -
            @foreach ($song->artists as $item)
                {{ $item->name }}
                @if ($loop->last)
                @else
                    ,
                @endif
            @endforeach
            <!-- Button trigger modal -->
            <form name="update" id="update" method="POST" action="<?php echo url('/delete-song'); ?>">
                @method('GET')
                <input type="hidden" name="id" value="<?echo $song->id?>">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop<?echo $song->id?>">
                    edit
                </button>
                <button type="submit" class="btn btn-primary">
                    delete
                </button>
            </form>
            {{-- <button type="submit" class="btn btn-primary">
                delete
            </button> --}}
            <?
            $_SESSION['id']=$song->id;
            ?>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop<?echo $song->id?>" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <?$_SESSION['id']=$song->id;?>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit song:</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form name="update" id="update" method="POST" action="<?php echo url('/edit-song'); ?>">
                                @method('PATCH')
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?echo $song->id?>">
                                    <label for="name">Name</label>
                                    <input type="text" id="" name="name" class="form-control"
                                        required="">
                                    <label for="artist">Artist</label>
                                    <input type="text" name="artist" class="form-control" required="">
                                    <label for="link">Link</label>
                                    <input type="text" name="link" class="form-control" required="">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        @endforeach
    @endif
    <script>
        form = document.getElementById("create");

        function saveSong() {
            form.action = "{{ url('store-form') }}";
            form.submit();
        }

        function searchArtist() {
            form.action = "{{ url('search-artist') }}";
            form.submit();
        }

        function searchSong() {
            form.action = "{{ url('search-song') }}";
            form.submit();
        }
    </script>
</body>

</html>
