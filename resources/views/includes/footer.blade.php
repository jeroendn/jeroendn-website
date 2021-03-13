<footer id="footer" class="mt-5">
  <div class="footer-wrapper container py-4">
    <div class="row">

      <div class="col-md mb-3">
        <h5>Pagina's</h5>
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="{{ route('projects') }}">Projects</a></li>
          <li><a href="{{ route('contact') }}">Contact</a></li>
        </ul>
      </div>

      <div class="col-md mb-3">
        <h5>Schoolprojecten</h5>
        <ul>
        @foreach($projects as $project)
            <li><a href="<?= $project->url ?>"><?= $project->name ?></a></li>
        @endforeach
        </ul>
      </div>

      <div class="col-md mb-3">
        <h5>Externe Links</h5>
        <ul>
          <li><a href="https://github.com/jeroendn" target="_blank">Github</a></li>
          <li><a href="https://www.linkedin.com/in/jeroen-de-nijs-437a191b1/" target="_blank">LinkedIn</a></li>
        </ul>
      </div>

    </div>
  </div>

  <div id="bottom-bar">
    <p>Copyright &copy; 2020 - <?php echo date('Y', $_SERVER['REQUEST_TIME']); ?> <a href="{{ route('home') }}">{{ config('app.name') }}</a></p>
  </div>
</footer>
