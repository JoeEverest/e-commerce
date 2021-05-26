<style>
    .bottom-bar {
        position: fixed;
        bottom: 0;
        width: 100vw;
        margin: 0;
        display: flex;
        justify-content: space-evenly;
        border-top: 0.2px solid #c4c4c4;
        background-color: #fff;
    }

    .bottom-bar span a {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-decoration: none;
        color: inherit;
        padding: 10px;
    }

    .bottom-bar .active {
        background-color: #c4c4c4;
    }
</style>
<script src="https://kit.fontawesome.com/f66031190f.js" crossorigin="anonymous"></script>
<div class="bottom-bar">
    <span id="home">
        <a href="../index.php">
            <i class="fas fa-home"></i>Home</a>
    </span>
    <span id="my_orders">
        <a href="../my_orders.php"><i class="fas fa-cart-arrow-down"></i>My Orders</a>
    </span>
    <span id="settings">
        <a href="../settings.php"><i class="fas fa-sliders-h"></i>Settings</a>
    </span>
</div>