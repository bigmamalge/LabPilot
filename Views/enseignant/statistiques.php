<?php
  $espace = "Espace enseignant-chercheur";
  $prenom = "John";
  $nom = "Doeuf";
  $nom_complet = $prenom . " " . $nom;
  $initiales = "JD";
  $fonction = "Enseignant-chercheur (LIUM)";
  $email = "john.doeuf@univ-lemans.fr";
  $poste = "Enseignant-chercheur";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Statistiques - LabPilot</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../Public/css/style.css">
  <link rel="stylesheet" href="../../Public/css/page.css">
</head>
<body>
  <input type="checkbox" id="theme-toggle" class="theme-check" aria-label="Mode sombre">
  <div class="layout">
    <?php $ThisPage = 6;
    require_once __DIR__ . '/SideBar.php'; ?>

    <div class="main">
      <?php require_once __DIR__ . '/topbar.php'; ?>

      <main class="content">
        <div class="page-head">
          <div>
            <p class="eyebrow"><?php echo $espace; ?></p>
            <h1>Statistiques</h1>
            <p class="lead">Analysez les inscriptions, la participation et les profils de vos participants pour piloter vos expérimentations.</p>
          </div>
          <div class="actions"><a class="btn primary" href="#"><img src="../../Public/assets/Common/stat_Group.svg" alt="" style="filter:brightness(0) invert(1)">Exporter le rapport (PDF)</a></div>
        </div>

        <div class="filters tight">
          <label class="select flat sm"><select aria-label="Période"><option>Ce semestre</option></select></label>
          <label class="select flat sm"><select aria-label="Expérimentation"><option>Toutes les expérimentations</option></select></label>
        </div>

        <section class="stats" aria-label="Indicateurs">
          <article class="card stat">
            <div class="top"><span class="ico sm"><img src="../../Public/assets/Common/stat_BiPeople.svg" alt=""></span><span class="delta up">+12 vs mois dernier</span></div>
            <div class="value">187</div><div class="label">Participants inscrits</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm"><img src="../../Public/assets/Common/stat_Groupe.svg" alt=""></span><span class="delta up">+4% vs mois dernier</span></div>
            <div class="value">78%</div><div class="label">Taux de participation moyen</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm"><img src="../../Public/assets/Common/stat_Trace1.svg" alt=""></span><span class="delta todo">-1% vs mois dernier</span></div>
            <div class="value">6%</div><div class="label">Taux d'annulation</div>
          </article>
          <article class="card stat">
            <div class="top"><span class="ico sm"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" stroke="#6d3fd1" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M11 2v18M15 6H9a2.5 2.5 0 0 0 0 5h4a2.5 2.5 0 0 1 0 5H6"/></svg></span><span class="delta neutral">Coupons &amp; crédits</span></div>
            <div class="value">64</div><div class="label">Rétributions distribuées</div>
          </article>
        </section>

        <div class="cols stat-cols">
          <section class="card pad">
            <h2 class="big sm">Évolution des inscriptions</h2>
            <p class="sub gap">Inscriptions cumulées sur les 6 dernières semaines, toutes expérimentations</p>
            <svg viewBox="0 0 746 250" width="100%" role="img" aria-label="Inscriptions cumulées sur 6 semaines">
              <g class="chart-grid" stroke-width="1"><line x1="0" y1="77" x2="746" y2="77"/><line x1="0" y1="138" x2="746" y2="138"/><line x1="0" y1="201" x2="746" y2="201"/></g>
              <polyline points="5,197 145,173 283,142 423,111 562,69 702,26" fill="none" stroke="#d4451b" stroke-width="2.5" stroke-linejoin="round"/><circle class="chart-dot" cx="5" cy="197" r="4.5" stroke="#d4451b" stroke-width="2"/><circle class="chart-dot" cx="145" cy="173" r="4.5" stroke="#d4451b" stroke-width="2"/><circle class="chart-dot" cx="283" cy="142" r="4.5" stroke="#d4451b" stroke-width="2"/><circle class="chart-dot" cx="423" cy="111" r="4.5" stroke="#d4451b" stroke-width="2"/><circle class="chart-dot" cx="562" cy="69" r="4.5" stroke="#d4451b" stroke-width="2"/><circle class="chart-dot" cx="702" cy="26" r="4.5" stroke="#d4451b" stroke-width="2"/><text x="114" y="236" text-anchor="middle" class="chart-lab" font-size="11" font-weight="600">S34</text><text x="218" y="236" text-anchor="middle" class="chart-lab" font-size="11" font-weight="600">S35</text><text x="322" y="236" text-anchor="middle" class="chart-lab" font-size="11" font-weight="600">S36</text><text x="426" y="236" text-anchor="middle" class="chart-lab" font-size="11" font-weight="600">S37</text><text x="529" y="236" text-anchor="middle" class="chart-lab" font-size="11" font-weight="600">S38</text><text x="633" y="236" text-anchor="middle" class="chart-lab" font-size="11" font-weight="600">S39</text></svg>
          </section>
          <section class="card pad fit">
            <h2 class="big sm">Répartition par genre</h2>
            <p class="sub">Profils des participants inscrits</p>
            <div class="donut-row">
              <div class="donut"><svg viewBox="0 0 144 144" width="146" height="146" role="img" aria-label="Répartition par genre" style="transform:rotate(-140deg)">
                <circle r="60" cx="72" cy="72" fill="none" stroke="#3d6d89" stroke-width="17" stroke-dasharray="158.34 376.99" stroke-dashoffset="-0.00"/><circle r="60" cx="72" cy="72" fill="none" stroke="#8489b8" stroke-width="17" stroke-dasharray="15.08 376.99" stroke-dashoffset="-158.34"/><circle r="60" cx="72" cy="72" fill="none" stroke="#d4451b" stroke-width="17" stroke-dasharray="203.58 376.99" stroke-dashoffset="-173.42"/></svg><div class="center"><b>187</b><span>participants</span></div></div>
              <ul class="dl">
                <li><i style="background:#d4451b"></i>Femmes<b>54%</b></li>
                <li><i style="background:#3d6d89"></i>Hommes<b>42%</b></li>
                <li><i style="background:#8489b8"></i>Autre / NC<b>4%</b></li>
              </ul>
            </div>
          </section>
        </div>

        <div class="cols two-eq">
          <section class="card pad">
            <h2 class="big sm">Inscriptions par expérimentation</h2>
            <div class="hbars">
              <div class="hbar"><span>Étude mémoire visuelle</span><div class="track"><i style="width:100%;background:#c2580f"></i></div><b>24</b></div>
              <div class="hbar"><span>Questionnaire post-test</span><div class="track"><i style="width:83%;background:#c2580f"></i></div><b>20</b></div>
              <div class="hbar"><span>Entretien qualitatif - Lot 2</span><div class="track"><i style="width:63%;background:#c2580f"></i></div><b>15</b></div>
              <div class="hbar"><span>Test utilisateur - nouvelle IHM</span><div class="track"><i style="width:50%;background:#c2580f"></i></div><b>12</b></div>
            </div>
          </section>
          <section class="card pad fit">
            <h2 class="big sm">Répartition par tranche d'âge</h2>
            <div class="hbars">
              <div class="hbar age"><span>18-25 ans</span><div class="track"><i style="width:61%;background:var(--text)"></i></div><b>38%</b></div>
              <div class="hbar age"><span>26-35 ans</span><div class="track"><i style="width:41%;background:var(--text)"></i></div><b>29%</b></div>
              <div class="hbar age"><span>36-45 ans</span><div class="track"><i style="width:24%;background:var(--text)"></i></div><b>18%</b></div>
              <div class="hbar age"><span>46 ans et plus</span><div class="track"><i style="width:12%;background:var(--text)"></i></div><b>15%</b></div>
            </div>
          </section>
        </div>

        <section class="card pad">
          <div class="exp-top"><h2 class="big sm">Taux de participation par expérimentation</h2><a class="link-b" href="participants.php">Voir les participants</a></div>
          <table class="data plain">
            <thead><tr><th>Expérimentation</th><th>Inscrits</th><th>Présents</th><th>Taux de participation</th><th>Annulations</th></tr></thead>
            <tbody>
              <tr><td><b>Étude mémoire visuelle</b></td><td>24</td><td>18</td>
                <td><span class="rate"><span class="bar"><i style="width:75%;background:var(--primary)"></i></span><b>75%</b></span></td><td>2</td></tr>
              <tr><td><b>Entretien qualitatif - Lot 2</b></td><td>15</td><td>6</td>
                <td><span class="rate"><span class="bar"><i style="width:40%;background:#6d3fd1"></i></span><b>40%</b></span></td><td>1</td></tr>
              <tr><td><b>Test utilisateur - nouvelle IHM</b></td><td>12</td><td>11</td>
                <td><span class="rate"><span class="bar"><i style="width:92%;background:var(--succes-text)"></i></span><b>92%</b></span></td><td>0</td></tr>
              <tr><td><b>Questionnaire post-test</b></td><td>20</td><td>15</td>
                <td><span class="rate"><span class="bar"><i style="width:75%;background:var(--primary)"></i></span><b>75%</b></span></td><td>3</td></tr>
              <tr><td><b>Perception sonore - Pilote</b></td><td>12</td><td>12</td>
                <td><span class="rate"><span class="bar"><i style="width:100%;background:var(--succes-text)"></i></span><b>100%</b></span></td><td>0</td></tr>
            </tbody>
          </table>
        </section>
        <div class="footer"><?php echo $espace; ?> - Le Mans Université</div>
      </main>
    </div>
  </div>
</body>
</html>
