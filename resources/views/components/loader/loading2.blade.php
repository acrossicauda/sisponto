<style>
    .loader {
        width: 45px !important;
        height: 40px !important;
        background: linear-gradient(#0000 calc(1*100%/6),#fff 0 calc(3*100%/6),#0000 0),
        linear-gradient(#0000 calc(2*100%/6),#fff 0 calc(4*100%/6),#0000 0),
        linear-gradient(#0000 calc(3*100%/6),#fff 0 calc(5*100%/6),#0000 0) !important;
        background-size: 10px 400% !important;
        background-repeat: no-repeat !important;
        animation: matrix 1s infinite linear !important;
        z-index: 9999 !important;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    @keyframes matrix {
        0% {
            background-position: 0% 100%, 50% 100%, 100% 100%
        }

        100% {
            background-position: 0% 0%, 50% 0%, 100% 0%
        }
    }

</style>

<div class="loader"></div>
