@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach ($lessons as $lesson)
            <div class="col-3">
                <div class="card bg-dark text-white border-dark m-3" style="min-height: 175px; max-height: 175px">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                            </div>
                            <div class="col-8">
                                <p class="h5 text-truncate">{{ $lesson->name }}</p>
                                <p class="text-secondary">Lesson level: {{ $lesson->level->name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-8">
                                <p class="card-text text-truncate">{{ $lesson->description }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <form action="#" method="post">
                                    <button type="submit" class="btn form-button mt-3">Learn</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-2"></div>
        <div class="col-8 bg-dark p-4" id="reviewEditor">
            @include('assets.messages')
            <form action="{{ route('review.store') }}" method="POST" id="sendReviewForm">
                <input type="hidden" name="course_id" id="course_id" value="{{ $lesson->course_id }}">
                <div>
                    <label for="rating" style="color: #fcd424">Rating</label>
                    <input type="hidden" name="rating" id="rating" value="0">
                </div>
                <div class="rating mb-3" id="ratingStars">
                    <span class="fa-regular fa-star ratingStars" onmouseover="chooseRating(this);"
                        onmouseout="removeRating()" onmousedown="pickRating(this)" id=1></span>
                    <span class="fa-regular fa-star ratingStars" onmouseover="chooseRating(this);"
                        onmouseout="removeRating()" onmousedown="pickRating(this)" id=2></span>
                    <span class="fa-regular fa-star ratingStars" onmouseover="chooseRating(this);"
                        onmouseout="removeRating()" onmousedown="pickRating(this)" id=3></span>
                    <span class="fa-regular fa-star ratingStars" onmouseover="chooseRating(this);"
                        onmouseout="removeRating()" onmousedown="pickRating(this)" id=4></span>
                    <span class="fa-regular fa-star ratingStars" onmouseover="chooseRating(this);"
                        onmouseout="removeRating()" onmousedown="pickRating(this)" id=5></span>
                </div>
                <div>
                    @csrf
                    <input id="content" type="hidden" name="content">
                    <trix-editor class="trix-content" input="content" id="trix"></trix-editor>
                </div>
                <div class="text-center mt-3">
                    <button class="btn form-button" id="sendButton">Send review</button>
                </div>
            </form>
        </div>
        <div class="col-2"></div>
    </div>

    {{-- Komment sorok --}}
    @foreach ($reviews as $review)
        <div class="row mt-2">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <div class="rating" id="rating">
                            @for ($i = 0; $i < 5; $i++)
                                @if ($i < $review->rating)
                                    <span class="fa-solid fa-star"></span>
                                @else
                                    <span class="fa-regular fa-star"></span>
                                @endif
                            @endfor
                        </div>
                        <div>
                            <h4 class="mt-3">{{ $review->user->name }}</h4>
                            <p class="card-text">@php echo $review->content; @endphp</p>
                        </div>
                        @if (Auth::user()->id == $review->user->id || Auth::user()->role_id == 1)
                           <div class="text-end w-100 d-flex justify-content-end">
                                {{-- <form action="{{ route('review.edit', $review) }}">
                                    @method('PUT')
                                    @csrf
                                    <button class="btn-unformatted text-warning">[edit]</button>
                                </form> --}}
                                <a id="edit" class="text-warning" onclick="editMessage(this);">[edit]</a>
                                <form id="delete" action="{{ route('review.destroy', $review) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn-unformatted text-danger">[delete]</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    @endforeach

    

    <script>
        //Fölé visszük az egeret
        let chooseRating = (star) => {
            //Az összes csillag aminek van ratingStars osztálya
            let ratingStars = document.getElementsByClassName('ratingStars');
            //Csillag sorszáma
            for (let index = 0; index < star.id; index++) {
                ratingStars[index].classList.remove('fa-regular');
                ratingStars[index].classList.add('fa-solid');
            }
        }

        //Ha levisszük róla az egeret
        let removeRating = () => {
            //Az összes csillag aminek van ratingStars osztálya
            let ratingStars = document.getElementsByClassName('ratingStars');
            //Csillag sorszáma
            for (let index = 0; index < ratingStars.length; index++) {
                if (ratingStars[index].classList.contains('choosen-star') == false) {
                    ratingStars[index].classList.add('fa-regular');
                    ratingStars[index].classList.remove('fa-solid');
                }
            }
        }

        //Rating kiválasztása (ha rákattintasz)
        let pickRating = (star) => {

            //Hidden Rating beállítása
            document.getElementById('rating').value = star.id;

            //Az összes csillag aminek van ratingStars osztálya
            let ratingStars = document.getElementsByClassName('ratingStars');
            //Csillag sorszáma
            for (let index = 0; index < ratingStars.length; index++) {
                if (index < star.id) {
                    ratingStars[index].classList.remove('fa-regular');
                    ratingStars[index].classList.add('fa-solid');
                    ratingStars[index].classList.add('choosen-star');
                } else {
                    ratingStars[index].classList.add('fa-regular');
                    ratingStars[index].classList.remove('fa-solid');
                    ratingStars[index].classList.remove('choosen-star');
                }

            }
        }


        let editMessage = (link) => {
            //Megkeresi a kommentet tároló kártyát
            let parentCard = link.parentElement.parentElement.parentElement;
            //A trix editorba berakja a kártya szövegének eredeti tartalmát
            document.getElementById('trix').innerHTML = "valami";
            //Megkeresi a trix editort és feketévé állítja a szöveget
            document.getElementById('trix').classList.add("text-dark");
            //Az eredeti kártyában eltünteti az edit és delete gombokat amíg szerkesztünk
            parentCard.querySelector('#edit').classList.add('d-none');
            parentCard.querySelector('#delete').classList.add('d-none');

            //Megtalálja az editort tartalmazó kártyát
            let editor = document.getElementById('reviewEditor');
            //Leszedi róla a col-8 osztályt
            editor.classList.remove('col-8');
            //Áthelyezi a kártyát az adott komment kártyájába
            parentCard.appendChild(editor);

            document.getElementById('sendButton').innerHTML = "Edit Review";
            document.getElementById('sendReviewForm').action = "#";
        }
    </script>
@endsection
