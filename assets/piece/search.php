<main>


<form method="GET" action="search.php" >
  <div class="poisk">
    <input type="text" name="query" placeholder="Введите название" class="input-search">
    <span class="search-icon" onclick="this.parentNode.parentNode.submit();">
      <svg class="yourSvgClass" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" onmouseover="changeSvgColors(this)" onmouseout="restoreSvgColors(this)">
	<path d="M10.6912 21.3812C13.0633 21.3807 15.367 20.5867 17.2355 19.1255L23.1103 25L25 23.1104L19.1252 17.2359C20.5872 15.3673 21.3818 13.0632 21.3824 10.6906C21.3824 4.79608 16.586 0 10.6912 0C4.79633 0 0 4.79608 0 10.6906C0 16.5852 4.79633 21.3812 10.6912 21.3812ZM10.6912 2.67265C15.1133 2.67265 18.7096 6.26871 18.7096 10.6906C18.7096 15.1125 15.1133 18.7086 10.6912 18.7086C6.26904 18.7086 2.6728 15.1125 2.6728 10.6906C2.6728 6.26871 6.26904 2.67265 10.6912 2.67265Z"></path>
	</svg>
    </span>
    <button type="reset" class="reset">
      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
	<path d="M18.25 18.5003L1.75 2.16406L18.25 18.5003ZM18.25 2.16406L1.75 18.5003L18.25 2.16406Z" fill="black"/>
	<path d="M18.25 18.5003L1.75 2.16406M18.25 2.16406L1.75 18.5003" stroke="white" stroke-width="3" stroke-linecap="round"/>
</svg>
    </button>
  </div>
</form>

<div class='container'>
<div class="card-container">
<?php include 'access/search_result.php'; ?>
</div>
</div>
</main>