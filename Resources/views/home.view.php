<?php include 'includes/header.php' ?>

<div class="main">
  <div id="bruce" class="banner">
    <div class="blackener">
      <h2>Authentic Pizza</h2>
      <h3>Inspired by Livorno Artisans</h3>
      <p>Experience the greatest pizza the likes of which the world has never seen the likes of which</p>
      <?php if(!Session::get('logged_in_user')) : ?>
        <a href="<?= url('/register') ?>">Register Today</a>
      <?php else : ?>
        <a href="<?= url('/order/make') ?>">Order Now</a>
      <?php endif ?>
    </div>
  </div>

  <div class="information wrapper">
    <div class="info-panels">
      <h2>Authentic</h2>
      <div class="image auth"></div>
      <p>Si da ve casa neve cima le. Divorato io esercita cipresso filaccie il. Plasmare scompare crudelta si da se fulminee fu. El la somigliava trasognato ex difenderlo le abbassando. Puo ami visto morte salvo turba virtu dio che sapro. Nell vivo sii afa pei tuoi mani nei otri. Barche me ha da bianca deliri. Dispare stasera com tue suo memoria. Non dopo file tra dei sul luce come dato. </p>
    </div>
    <div class="info-panels">
      <h2>Buzzword</h2>
      <div class="image buzz"></div>
      <p>Pace ma no ando resa sera un. Guardavamo dormissero ingannaste fra nel chi del. La viva nudo la volo rote bene. Congiunto re andarmene no ha riconosce apparenze estenuato mutamento. Sorriso ritardo baciato ti te ti oh lucenti. Sara osi sul hai caro sera vedo vai. Presenta dov tamerici oro chiedete spezzare stillano partirmi noi. Perfezione pie che pel seducevano adorazione ricordarti. Abbandona vigilanza conquista osservava la mi la splendido. </p>
    </div>
    <div class="info-panels">
      <h2>Pizza</h2>
      <div class="image pizza"></div>
      <p>Imagine disceso osi ero vedrete. Molte udivo avere con degna manca non valsa. Mai acerbita felicita dovresti disparte filaccie oleandri uno col piu. Le cipresso eviterai la dovevamo infinita no. Una seminato dissecca gloriosa sei dovresti sai obbedito mutevole. Rinnova te or imagine se salvato rimasto si. Fu mi gurge nulla farmi nuovi ti. Sapete ho saluti guarda vi bearmi tenuta lo. Donna mi nelle ah potra crede quell. </p>
    </div>
  </div>
  <div class="call-to-action">
    <?php if(!Session::get('logged_in_user')) : ?>
      <h2>Get Pizza Delivered Today</h2>
      <a href="<?= url('/register') ?>">Register Now</a>

    <?php else : ?>
      <h2>Get Pizza Delivered Today</h2>
      <a href="<?= url('/order/make') ?>">Order Now</a>
    <?php endif ?>
  </div>
</div>

<?php include 'includes/footer.php' ?>
