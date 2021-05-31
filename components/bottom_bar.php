<style>
    .bottom-bar {
        position: fixed;
        bottom: 10px;
        width: 95vw;
        margin: 0;
        display: flex;
        justify-content: space-evenly;
        background-color: #fff;
        border-radius: 40px;
        box-shadow: 1px 0px 2px 2px #c4bfbf4d;
        padding: 5px;
    }

    .bottom-bar span a {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-decoration: none;
        color: #a3a1a1;
        padding: 5px;
        font-size: 14px;
    }

    .bottom-bar .active * {
        color: #07BEB8;
    }
</style>
<script src="https://kit.fontawesome.com/f66031190f.js" crossorigin="anonymous"></script>
<div class="bottom-bar">
    <span id="home">
        <a href="index.php">
            <i class="fas fa-home"></i>Home</a>
    </span>
    <span id="categories">
        <a href="./categories.php"><i class="fas fa-list"></i>Categories</a>
    </span>
    <span id="my_orders">
        <a href="my_orders.php"><i class="fas fa-shopping-cart"></i>My Orders</a>
    </span>
    <span id="account">
        <a href="./account.php"><i class="far fa-user-circle"></i>My Account</a>
    </span>
</div>