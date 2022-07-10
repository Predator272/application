<style>
.form-search {  
  position: relative;
  display: inline-block;
  border: 1px solid #747474;
  border-radius: 3px;
  box-shadow: inset 0 1px 1px #575555, 0 1px 0 #FFF;
  background: linear-gradient(90deg, rgba(10,3,128,1) 0%, rgba(121,9,89,1) 51%, rgba(0,212,255,1) 100%);
}
.form-search:before {  /* рамка можно передлать больше например*/
  position: absolute; /* можно стелать sliky и тогда будет постоянно на экране*/
  content: "";
  top: -5px;
  right: -5px;
  bottom: -5px;
  left: -5px;
  z-index: -1;
  border-radius: 5px;
  background: linear-gradient(90deg, rgba(10,3,128,1) 0%, rgba(121,9,89,1) 51%, rgba(0,212,255,1) 100%);
}
.form-search:focus-within {  /* изменение формы при наведении на него */
  box-shadow: inset 0 1px 1px #46575b, 0 1px 0 #FFF;
  background: linear-gradient(90deg, rgba(10,3,128,1) 0%, rgba(121,9,89,1) 51%, rgba(0,212,255,1) 100%);
}
.form-search input[type="search"] {  /* поле поиска */
  width: 160px;
  height: 32px;
  line-height: 132px;
  border: none;
  outline: none;
  box-shadow: none;
  padding: 0 0 0 6px;
  background: transparent;

}
.form-search:focus-within input[type="search"],  /* изменение поля поиска при фокусе */
.form-search input[type="search"]:focus {
   width: 190px;/* можно добавить выдвиг больше */
  color: #25464D;
}
.form-search input[type="image"] {  /* картинка с инпута потом вставить */
  padding: 0;
  vertical-align: bottom;
}
</style>

<form class="form-search" style="position: relative; left:1000px; top:50px" action="/search/" target="">
  <input type="hidden" name="searchid" value="808327">
  <input type="search" name="text" required placeholder="поиск">
  <input type="image" src="вставить потом картинку"/> 
</form>