<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="?s=ffxiv" class="brand-link">
    <img src="img/ffxiv-logo.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">ffxiv-builder</span>
    </a>

    <div class="sidebar">

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
            <!-- Allgemein -->
            <li class="nav-header">Allgemein</li>
            <li class="nav-item">
                <a href="#" onclick="$('#modal_new').modal('show')" class="nav-link">
                <i class="fas apple-whole"></i>
                <p>
                    Neuigkeiten
                    <span class="right badge badge-danger">New</span>
                </p>
                </a>
            </li>
        
            <li class="nav-header">Builder</li>
            <li class="nav-item">
                <a href="?s=loadouts" class="nav-link">
                  <i class="fab fa-buffer nav-icon"></i>
                  <p>
                      Loadouts
                  </p>
                </a>
            </li>

            <li class="nav-header">Databases</li>
            <li class="nav-item">
                <a href="?s=itemdb" class="nav-link">
                  <i class="fab fa-buffer nav-icon"></i>
                  <p>
                      Items
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="?s=classdb" class="nav-link">
                <i class="fab fa-buffer nav-icon"></i>
                  <p>
                      Classes (ADM ONLY)
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="?s=relationdb" class="nav-link">
                  <i class="fab fa-buffer nav-icon"></i>
                  <p>
                      Releation (ADM ONLY)
                  </p>
                </a>
            </li>
        
        </ul>
    </nav>
    </div>
</aside>

<div class="modal fade" id="modal_new" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">About</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <b>Update - v1.3</b><br><br>
        <ul>
            <li>+ Items sind nun mehreren Klassen zuordenbar</li>
            <li>+ Datenbanken sind nun via GUI vom Admin einsehbar</li>
        </ul>
        <b>Update - v1.2</b><br><br>
        <ul>
            <li>+ Bug mit Klassennamen behoben</li>
        </ul>
        <b>Update - v1.1</b><br><br>
        <ul>
            <li>+ 20 Klassen der Datenbank hinzugefügt</li>
        </ul>
        <b>Update - v1.0</b><br><br>
        <ul>
            <li>+ Idee und Konzeption</li>
            <li>+ Erstellung der Datenbank-Tabellen</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>