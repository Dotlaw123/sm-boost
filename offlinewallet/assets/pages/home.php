<?php
$user=$_SESSION['userdata'];
$balance = $user['balance']=getCreditedBalance($user['id'])- getDebitedBalance($user['id']);
$history = $user['trans_history']=getTransHistory($user['id']);

?>
<div class="container">
    <div id="menu_bar" class="d-flex justify-content-between col-7 m-auto mt-3">
        <button type="button" class="btn btn-primary">
            Wallet <span class="badge bg-secondary">N<?=$balance?> </span>
        </button>

        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Withdraw Money
        </button>
    </div>




    <div id="trans_list">
        <?php
foreach($history as $trans){
  $suffix="";
    if($trans['from_user_id']==$user['id']){
        $color="danger";
$suffix= "to ".getUserById($trans['to_user_id'])['full_name']." (".getUserById($trans['to_user_id'])['mobile'].") " ;
    }else{
        $color="success";

$suffix= "from ".getUserById($trans['from_user_id'])['full_name']." (".getUserById($trans['from_user_id'])['mobile'].") " ;

    }
    ?>
        <div class="card col-7 shadow rounded m-auto mt-3">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h6 class=" mb-2 text-muted"><?=$suffix?></h6>
                    <p class="card-text"><?=$trans['created_at']?></p>
                </div>
                <h4 class="card-title text-<?=$color?>"><b><?=$color=='danger'?'-':'+'?>N <?=$trans['amount']?> </b>
                </h4>
            </div>
        </div>
        <?php
}

?>



    </div>



</div>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">withdraw Money</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Enter withdrawal code:9999999999</span>
                        <input type="text" class="form-control" id="user_mobile_no"
                            placeholder="enter withdrawal code ..." aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Amount</span>
                        <input type="text" class="form-control" id="amount" placeholder="enter amount to send.."
                            aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status" id="loading" style="display:none">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

                <div class="alert alert-success" role="alert" id="s_msg" style="display:none">

                </div>
                <div class="alert alert-danger" role="alert" id="e_msg" style="display:none">

                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hide</button>
                <button type="button" id="send_money" class="btn btn-primary">Withdraw Money</button>
            </div>
        </div>
    </div>
</div>