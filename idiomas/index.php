<?php
@session_start();
include 'include/menu_lang.inc.php';

if(!isset($_SESSION['idioma'])) {
    $_SESSION['idioma'] = $idioma_default;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    




    <?php
    include 'include/lang.'.$_SESSION['idioma'].'.php';
    echo $arrLang['geral']['bem_vindo'];
    ?>

    <h1>
    <?php
    echo $arrLang['noticias']['titulo'];
    ?>
    </h1>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores laborum nisi voluptates, dolorum dignissimos ea tempora debitis ipsum vero est, necessitatibus eum quas et exercitationem nam voluptatum. Labore a ad sint eveniet saepe porro laudantium. Saepe, quod consequuntur nam laborum ipsum reprehenderit. Natus in neque atque maiores libero dignissimos, suscipit cum debitis accusantium architecto corporis laboriosam esse tenetur quos incidunt expedita a? Delectus maiores iste omnis earum at quos, perferendis ratione ipsam, et alias dignissimos deleniti, velit tenetur sapiente! Laborum pariatur fugit quam dolore obcaecati ipsa dolor, dicta minus tempore velit at incidunt quae saepe dolorum, recusandae aliquam veniam rem maiores ab iusto vitae! Exercitationem iste repellat expedita atque. Quis ipsum necessitatibus beatae corporis doloribus rerum laboriosam amet corrupti molestias, nam suscipit quibusdam animi possimus quia nemo dolore distinctio non aliquam facilis accusantium temporibus, magnam voluptatibus eaque! Quae exercitationem necessitatibus facere veniam laborum culpa, labore quidem accusamus placeat nulla non doloribus itaque voluptas odit qui, illo dolores temporibus cumque. Suscipit eos dignissimos accusantium cumque magni illo excepturi quas facilis accusamus nemo tenetur earum eveniet quibusdam nisi nostrum explicabo fugiat, atque repudiandae deserunt, architecto nam minus totam esse hic. Distinctio laborum quas, omnis, repellat dicta consectetur iste totam voluptatum excepturi dolores nulla. Quod explicabo, doloribus molestiae similique repellendus perspiciatis incidunt a blanditiis aliquid, ut exercitationem odio iste eos reiciendis ex. Fuga sint perspiciatis voluptate accusantium animi ratione nulla voluptas debitis voluptatum provident. Magnam itaque ad sequi sunt perferendis cumque id fugit rerum blanditiis aliquam. Voluptates debitis, tenetur id vel reiciendis quasi voluptatem numquam, commodi temporibus ipsam laborum rem, fuga aspernatur et! Odio commodi tempora tenetur corrupti nam accusamus, numquam iure molestias repudiandae veniam, qui, rerum eveniet voluptatem alias. Accusamus, quae neque inventore provident consequatur hic, quas quisquam nemo, a corporis ipsam commodi? Quam, nisi accusamus! Eius ipsum commodi, hic, error corrupti modi voluptatem, numquam libero delectus odio consequuntur non nihil cumque explicabo doloribus voluptate dolore reprehenderit veniam minus possimus? Recusandae asperiores dolor illo debitis dolorem, sunt nulla explicabo fugit nam iure praesentium incidunt possimus, natus, veniam laboriosam maxime nesciunt necessitatibus consectetur? Maiores possimus praesentium optio deleniti perferendis dolorem consequuntur, nisi aliquam corporis corrupti enim tempore ullam aspernatur debitis, unde nam explicabo consequatur cum laboriosam doloremque blanditiis? Dignissimos aspernatur quisquam ipsam quidem accusantium laboriosam consectetur. Soluta beatae iure, voluptates fugit totam, enim voluptas voluptatem ratione perferendis aliquam sequi ea? Commodi exercitationem nulla earum enim possimus, molestiae atque cumque reiciendis nam, quibusdam soluta fugit. Necessitatibus quod aut itaque nam magnam minus obcaecati totam ea, pariatur praesentium eveniet consequuntur laudantium, a aperiam odit reprehenderit ipsam in provident. Commodi, doloremque est. Ut consequatur dolor temporibus enim officia, optio earum sequi natus fugit deserunt dolores inventore ipsa ea voluptates accusamus similique quae dignissimos non at. Velit iure facilis voluptate ratione vel non exercitationem maxime cum reiciendis amet debitis assumenda voluptatem, laboriosam voluptas aperiam enim, eos quaerat quae neque voluptatum dolore dignissimos optio. Tenetur excepturi optio, quam libero sint amet, commodi sequi ratione, necessitatibus laudantium quo fugit voluptas asperiores. Tenetur, ducimus aut! Aliquam quia ullam sed amet!</p>

</body>
</html>