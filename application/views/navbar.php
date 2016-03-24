<div class="ui top fixed labeled icon inverted menu">
  <div class="header item">
    <a href="/traffic/success/<?= $this->session->userdata['id']; ?>">
      <h1><i class="olive paw icon"></i> Woof Woof Go!</h1>
    </a>
  </div>
  <div class="right menu">
    <a class="item" href="/traffic/success/<?= $this->session->userdata['id']; ?>">
      <i class="home icon"></i> Home
    </a>
    <a class="item" href="/traffic/messages/<?= $this->session->userdata['id']; ?>">
      <i class="mail icon"></i>Mailbox
    </a>
    <a class="item" href="/traffic/map/<?= $this->session->userdata['id']; ?>">
      <i class="location arrow icon"></i> View Map
    </a>
  </div>
</div>
