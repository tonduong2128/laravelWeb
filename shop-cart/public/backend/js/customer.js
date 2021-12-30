try{
    var checkItems = document.querySelector('.check-items');
    var checkItem = document.querySelectorAll('.check-item');
    
    checkItem = Array.from(checkItem);
    
    checkItems.onchange = (e)=>{
        if (checkItem.every((item)=>item.checked == true)){
            checkItem.forEach((item)=>{
                item.checked = false;
            });
        } else {
            checkItem.forEach((item)=>{
                item.checked = true;
            });
        }
    }
    var subMenus = document.querySelectorAll('.sub-menu a[href="javascript:;"]');
    var indexMenu = localStorage.getItem('indexMenu') || 0;
    subMenus = Array.from(subMenus);
    subMenus[indexMenu].click();
    subMenus.forEach((subMenu, index)=>{
        subMenu.onclick=()=>{
            localStorage.setItem('indexMenu',index);
        };
    });
} catch(e){
}

