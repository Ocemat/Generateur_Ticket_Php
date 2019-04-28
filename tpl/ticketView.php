<h2 class="text-center">Tickets en cours</h2>

<table class="tableau">
   
        <tr>
            <th>N° Ticket </th>
            <th> N° Noob </th>
            <th> N° Reason </th>
            <th> N° Boss </th>
            <th> N° Urgence </th>
            <th> Action </th>
        </tr>
        <?php
        //on parcours le tableau résultat (rappel qui contient des objet de type ticket)
        foreach ($tickets as $ticket) {
            ?>
        <tr>
            <td> <?= $ticket->getId() ?> </td>
            <td> <?= $ticket->getIdNoob() ?> </td>
            <td> <?= $ticket->getIdReason() ?> </td>
            <td> <?= $ticket->getIdFormateur() ?> </td>
            <td> <?= $ticket->getIdUrgence() ?> </td>
            <td><a href="index.php/delete?id=<?=$ticket->getId()?>"> <button> Delete </button> </a> </td>
        </tr>    
        <?php } ?>
        
</table>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>