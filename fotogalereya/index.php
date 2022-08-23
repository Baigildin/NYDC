<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Фотогалерея");
?>
<?
CModule::IncludeModule("fileman");
CMedialib::Init();
$arCol = CMedialibCollection::GetList(array('arFilter' => array('ACTIVE' => 'Y')));
$arItems = CMedialibItem::GetList(array('arCollections' => array($arCol[0]['ID'])));
$arImgPath = array();
$count = 0;
foreach ($arItems as $arItem){
 $imgPath = $arItem['PATH'];
 $arImgPath[] = $imgPath;
 $count++;
};
?> 
    <div class="gallery-wrapper">
      <div class="container">
        <h1>Фотогалерея клиники</h1>
        <div class="row pl">
          <div class="col-lg-10">
            <div class="grid">
              <div class="grid-sizer"></div>
              <?foreach ($arImgPath as $imgPathK => $imgPath):?>
              <?if($imgPathK==10)break;?>
              <div class="grid-item"><a class="inner" style="background-image: url(<?=$imgPath;?>);" data-fancybox="gallery" href="<?=$imgPath;?>"></a></div>
              <?endforeach;?>
            </div>
            <div class="more-btn">
              <?if($count>10):?>
              <button class="btn" type="button">Больше фото</button>
              <?endif;?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      $(function() {
        let count = 10;
        let elementCount = <?=$count;?>;
        $(document).on('click', '.btn', function(event) {
          event.preventDefault();
          $.ajax(
          {
            url: '/ajax/allPhoto.php',
            type: 'post',
            dataType: 'html',
            data: 'count='+count,
            success: function(data)
            { 

              //$grid = $('.grid');
              //$grid.masonry('destroy');
              //$('.grid-item').last().after(data);
              
              //$grid.masonry();
             //setTimeout(function(){
             //     $('.grid').masonry('reloadItems');
             //}, 1000)
             
             
                 $("div.grid").append(data).each(function(){
                    $('.grid').masonry('reloadItems');
                });
                
                $('.grid').masonry();
            }
          });
          count = count + 10;
          if(elementCount<count){
            $('.btn').remove();
          }
        })
      })
    </script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>