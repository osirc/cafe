<div class="container-fluid">
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Funds</th>
                <th scope="col">Status</th>
                <th scope="col">sendDate</th>
                <th scope="col">image</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $transactions = json_decode($transactions,true);
            
            foreach($transactions as $transaction) {
            ?>
            <tr>
                <th scope="row"><?php echo $transaction["id"]; ?></th>
                <td>$<?php echo $transaction["funds"]; ?></td>
                <td><?php echo $transaction["statusID"]; ?></td>
                <td><?php echo $transaction["sendDate"]; ?></td>
                <td><img src=<?php echo "'images/transactions/" . $transaction["imagePath"] . "'";?>></td>
            </tr>    
            <?php
            } //for end
            ?>
            </tbody>
        </table>
    </div>
</div>
