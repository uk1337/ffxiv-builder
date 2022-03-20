<nav class="main-header navbar navbar-expand navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="?s=ffxiv" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="?s=creator" class="nav-link">Creator</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a target="_blank" href="https://discord.gg/t5MjDBwvQD" class="nav-link">Discord</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block" onclick="$('#modal_about').modal('show')">
            <a href="#" class="nav-link">About</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="?s=admin" class="nav-link">Admin Panel</a>
        </li>
    </ul>
</nav>

<div class="modal fade" id="modal_about" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">About</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
        <b>ffxiv-builder</b> ist ein Projekt, dass im Rahmen unserer Schulfachs AWP entstanden ist. Dabei geht es um die verwendung von SQL
        und der realationen von Datenbanken.
        <br><br>
        Dabei geht es um das veröffentlichen von verschiedenen Final Fanatasy 14 Equipments, um sich als Anfänger besser zu schützen oder
        im PvP-Kampf einen gewissen Vorteil zu erhalten. Jegliche Spieler aus aller Welt können hier ihre Loadouts hochladen und mit der Community
        teilen.
        <br><br><br>
        <b>Ersteller</b><br><br>
        elCallado#1111
        <ul>
            <li>Idee und Konzeption</li>
            <li>Erstellung der Datenbank-Tabellen</li>
        </ul>
        </p>
        <br>
        uknwn#0001
        <ul>
            <li>Anpassung der Datenbank-Tabellen</li>
            <li>Programmierung des PHP-Frameworks und DB-Anbindung</li>
            <li>Einbindung von Bootstraps und AdminLTE</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>