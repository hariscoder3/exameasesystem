<nav class="navbar navbar-expand-lg bg-dark bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('exam.index')}}">Exam Ease System</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('exam.index')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('exam.create')}}">Add Exam</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('runExam.viewExam')}}">Running Exam</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('umc.create')}}">Add UMC</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('umc.show')}}">UMC Cases</a>
          </li>
          
        </ul>   
      </div>
    </div>
  </nav>