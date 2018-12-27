var toggleStatus=  0;
var clientstatus= 0  ;

function toggleMenu() {
    if (toggleStatus === 1 )
    {
        document.getElementById("menu").classList.add('menu-exit');
        document.getElementById("menu").classList.remove('menu-open');
        document.getElementById('div').style.backgroundColor='#54CDC0';

        div.classList.remove('fa-times');
        div.classList.add('fa-bars');
        toggleStatus = 0;
    }
    else if (toggleStatus  === 0)
    {
        document.getElementById("menu").classList.remove('menu-exit');
        document.getElementById("menu").classList.add('menu-open');
        div.classList.remove('fa-bars');
        div.classList.add('fa-times');
        document.getElementById('div').style.backgroundColor='transparent';
        toggleStatus = 1;

    }

}

function clientMenu(){

    if (clientstatus === 0 )

    {
        document.getElementById('link-client').classList.toggle('menu-client-open');
        document.getElementById('client').classList.toggle('menu-client-text-left');

        clientstatus= 1 ;
    }

    //link-client = open / menu-client = exit

    else if (clientstatus === 1)
    {
        document.getElementById('link-client').classList.toggle('menu-client-open');
        document.getElementById('client').classList.toggle('menu-client-text-left');

        clientstatus= 0 ;

    }

}