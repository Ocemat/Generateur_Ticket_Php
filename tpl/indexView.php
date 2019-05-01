<section id="container1" class="container-fluid">
    <form action="index.php/createTicket" method="GET">

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Noobs</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select name="listeNoobs" size="1">
                                        <option value=" " hidden> Qui est le noob ? </option>
                                        <?php foreach ($noobs as $humain) { ?>
                                            <option value=<?= $humain->getId() ?>> <?= $humain->getNom() ?> <?= $humain->getPrenom() ?> </option>
                                        <?php }  ?>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Fucking Reasons</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select name="listeRaisons" size="1">
                                        <option value=" " hidden> Quelle est votre raison ? </option>
                                        <?php foreach ($reasons as $reason) { ?>
                                            <option value=<?= $reason->getId() ?>> <?= $reason->getLibelle() ?> </option>
                                        <?php }  ?>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Boss</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select name="listeFormateurs" size="1">
                                        <option value=" " hidden> Qui est le formateur ? </option>
                                        <?php foreach ($bosses as $boss) { ?>
                                            <option value="<?= $boss->getId() ?>"> <?= $boss->getPrenom() ?> <?= $boss->getNom() ?> </option>
                                        <?php }  ?>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Urgence ?</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <option value=" " hidden> Quelle est votre urgence ?</option>
                                    <select name="listeUrgence" size="1">
                                        <?php foreach ($urgences as $urgence) { ?>
                                            <option value=<?= $urgence->getId() ?>> <?= $urgence->getLibelle() ?> </option>
                                        <?php }  ?>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div><button type="submit" class="btn btn-primary btn-lg btn-block">Générer un
                ticket</button></div>
        </div>
    </form>
</section>

<section id="container1" class="container-fluid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Tickets en cours</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <table class="table">

                        <tr>
                            <th> N° Ticket </th>
                            <th> Date et Heure </th>
                            <th> Temps d'attente </th>
                            <th> Nom Noob </th>
                            <th> Reason </th>
                            <th> Nom Boss </th>
                            <th> Urgence </th>
                            <th> Action </th>
                        </tr>
                        <?php
                        //on parcours le tableau résultat (rappel qui contient des objet de type ticket)
                        foreach ($tickets as $ticket) {
                            ?>
                            <tr>
                                <td> <?= $ticket->getId() ?> </td>    
                                <td> <?= $date = $ticket->getDateHeure() -> format('d-m-Y H:m:s');?>  </td>  
                                <td><?php 
                                $timestamp = time() - strtotime($date);
                                $date = new \DateTime();
                                // If you must have use time zones
                                //$date = new \DateTime('now', new \DateTimeZone('Europe/Paris'));
                                $date->setTimestamp($timestamp);
                                echo $date->format('H:i:s');
                                ?> / 
                                <?= $timestamp = time();
                                $date = new \DateTime();
                                $date->setTimestamp($timestamp);
                                echo $date->format('H:i:s'); ?></td>
                
                                <td> <?= $ticket->getIdNoob()?>  </td>
                                <td> <?= $ticket->getIdReason() ?> </td>
                                <td> <?= $ticket->getidFormateur() ?> </td>
                                <td> <?= $ticket->getIdUrgence() ?> </td>
                                <td><a href="index.php/delete?id=<?= $ticket->getId() ?>"> <button> Delete </button> </a> </td>
                            </tr>
                        <?php } ?>

                    </table>
                </div>
            </div>
        </div>

    </div>

    </div>
    <a href = "html2pdf/html2pdf.class.php"> Générer un pdf </a>
</section>

 
                                


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>