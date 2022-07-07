 <!-- Responsive navbar-->
 <nav class="navbar navbar-expand-sm bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/quiz-logo.png') }}" alt="Logo" style="width:80px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('home') }}">Quiz</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('questions') }}">Questions</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('statistic') }}">Statistic</a></li>
            </ul>
        </div>
    </div>
</nav>
