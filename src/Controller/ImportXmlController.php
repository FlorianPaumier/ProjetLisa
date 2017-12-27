<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 25/12/17
 * Time: 10:28
 */

namespace App\Controller;

use App\Entity\ArticleEntity;
use App\Entity\CatalogueEntity;
use App\Entity\MagasinEntity;
use App\Entity\MediaEntity;
use App\Entity\OperationEntity;
use App\Entity\PageEntity;
use App\Entity\ParametresEntity;
use App\Entity\PrixArticleCategoryEntity;
use App\Entity\ValueParamsEntity;
use App\Entity\ZoneEntity;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use SimpleXMLElement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Class ImportXmlController
 * @package App\Controller
 */
class ImportXmlController extends Controller
{

    /**
     * @var string
     */
    private $dirImportXml = "/home/user/Documents/Developpement/API_Project_BTS/ImportLisa/";

    /**
     * Fonction d'entré dans le système d'importation
     */
    public function main(): void
    {
        try{
            //Si le chemin par défaut exist et est un dossier
            if($dirExist = is_dir($this->dirImportXml)){

                //si on arrive a lire le dossier
                if($handle = scandir($this->dirImportXml)){

                    //pour chaque élément trouver on le scan
                  foreach ($handle as $dir){
                       $dirImport = scandir($this->dirImportXml.$dir);

                       //pour chaque élément trouvé on test si c'est un fichier xml
                       foreach ($dirImport as $item){
                           $info = new \SplFileInfo($item);
                           if($info->getExtension() == "xml"){
                               //On lance l'importation
                               $this->ImportXmlFile(
                                   $this->dirImportXml.$dir.DIRECTORY_SEPARATOR.$item);
                           }
                       }
                   }
                }
            }
         die();
        }catch (Exception $e){

        }
    }
    //test de la présence du fichier
    //ouverture du fichier xml
    //on parse le fichier
        //Operation
        //Catalogue
        //Magasin
        //Page
        //Article
    //on supprime le dossier
//}
#region


        /// <summary>
        /// Fonction pour l'importation d'un fichier Xml
        /// On itère sur chaque node importante puis on rentre à l'intèrieure
        /// </summary>
        /// <param name="filePath">Chemin du fichier à importer</param>
    /**
     * @param string $filePath
     */
    private function ImportXmlFile(string $filePath)
        {
            try
            {
                $em = $this->getDoctrine()->getManager();

                if($xmlfile = simplexml_load_file($filePath, "SimpleXMLElement", LIBXML_NOCDATA)){

                    //On parcours les opérations
                    foreach ($xmlfile->operation as $operationElement){

                        //On va créer puis récupérer l'opération
                        /** @var EntityManager $entityManager */
                        /** @var ObjectManager $em */
                        /** @var OperationEntity $operation */
                        $operation = $this->GetOperation($operationElement, $em);

                        //On parcours les catalogues
                        foreach ($operationElement->catalog as $catalogElement){

                            //On va créer le catalogue et le récupérer
                            /** @var SimpleXMLElement $catalogElement */
                            /** @var OperationEntity $operation */
                            /** @var ObjectManager $em */
                            /** @var CatalogueEntity $catalogue */
                            $catalogue = $this->GetCatalogue($catalogElement, $operation, $em);

                            //On parcours les pages
                            foreach ($catalogElement->pages->page as $pageElement){

                                //on créer la page et on la récupère
                                $page = $this->GetPage($pageElement, $catalogue, $em);

                                //On parcours les pages
                                foreach ($pageElement->products->product as $productElement){

                                    //On va créer un article et récupérer tous les éléments nécessaires
                                    $article = $this->GetArtcile($productElement, $page, $em);
                                    $this->GetArticleParams($productElement, $article, $em);
                                    $this->GetMedia($productElement, $article, $em);
                                    $this->GetPrixArticle($productElement, $article, $catalogue, $em);

                                    //on parcours les zones
                                    foreach ($productElement->zones->zone as $zoneElement){
                                        //On créer la zone
                                        $this->GetZoneArticle($zoneElement, $article, $em);
                                    }
                                }
                            }

                            //On parcours les magasins
                            foreach ($catalogElement->shops->shop as $shopElement){
                                //On créer les magasins
                                $this->GetShop($shopElement, $catalogue, $em);
                            }
                        }
                    }

                    //on persite dans la base de données
                    $this->getDoctrine()->getManager()->flush();
                }



//                    //On parcours les éléments ayant comme node operation
//                    foreach (XElement operationElement in doc.Descendants(XName.Get("operation")))
//                    {
//                        Operation operation = ParseOperationElement(operationElement, entities);
//
//                        //On parcours les éléments ayant comme node catalog
//                        foreach (XElement catalogueElement in operationElement.Descendants(XName.Get("catalog")))
//                        {
//                            Catalogue catalogue = ParseCatalogueElement(catalogueElement, entities, operation);
//
//                            //On parcours les éléments ayant comme node shop
//                            foreach (XElement magasinElement in catalogueElement.Descendants(XName.Get("shop")))
//                            {
//                                ParseMagasinElement(magasinElement, entities, catalogue);
//                            }
//
//                            //On parcours les éléments ayant comme node page
//                            foreach (XElement pageElement in catalogueElement.Descendants(XName.Get("page")))
//                            {
//                                Page page = ParsePagesElement(pageElement, entities, catalogue);
//
//                                //On parcours les éléments ayant comme node product
//                                foreach (XElement productElement in pageElement.Descendants(XName.Get("product")))
//                                {
//                                    Article product = ParseProductElement(productElement, entities);
//                                    PageArticle pageArticle = ParsePageArticle(productElement, entities, product, page);
//                                    String[] picturePath = getMultiMedia(productElement, "image");
//                                    String[] pictoPath = getMultiMedia(productElement, "picto");
//
//                                    for (int i = 0; i < picturePath.Length; i++)
//                                    {
//                                        ParseImageArticle(productElement, entities, product);
//                                    };
//
//                                    for (int i = 0; i < pictoPath.Length; i++)
//                                    {
//                                        ParsePictoArticle(productElement, entities, product);
//                                    }
//
//                                    ParsePrixCatalogueArticle(productElement, entities, catalogue, product);
//                                }
//                            }
//                        }
//                    }
//
//                    //On lance la raquête d'insertion dans la BDD
//                    entities.SaveChanges();
            }
            catch (Exception $e)
            {
//                foreach (var item in e.EntityValidationErrors)
//                {
//                    foreach (var itemValidation in item.ValidationErrors)
//                    {
//                        Console.WriteLine(itemValidation.ErrorMessage);
//                    }
//                }
//                Console.WriteLine(e.EntityValidationErrors);
//                throw;
            }
        }

    /**
     * @param SimpleXMLElement $operationElement
     * @param ObjectManager $em
     * @return OperationEntity
     */
    private function GetOperation(SimpleXMLElement $operationElement, ObjectManager $em): OperationEntity
        {
            //Dans cette partie on récupère les données
            //(array) correspond un cast de SimpleXMLElement en tableau
            $attribute = (array)$operationElement->attributes();
            $children = (array)$operationElement->children();


            //On récupères les valeurs
            $importID = $attribute["@attributes"]["id"];
            $code = $children["code"];
            $title = $children["title"];
            $startDate = $this->UnixTimeStampToDateTime(doubleval($children["startDate"]));
            $endDate = $this->UnixTimeStampToDateTime($children["endDate"]);

            //Partie de création de l'objet Operation
            $operation = new OperationEntity();

            $operation->setTitle($title);
            $operation->setCodeCatalogue($code);
            $operation->setStartDate($startDate);
            $operation->setEndDate($endDate);
            $operation->setImportID($importID);

            //On sauvegarde l'opération en mémoire
            $em->persist($operation);

            return $operation;
        }


    /**
     * @param SimpleXMLElement $catalogElement
     * @param OperationEntity $operation
     * @param ObjectManager $em
     * @return CatalogueEntity
     */
    private function GetCatalogue(SimpleXMLElement $catalogElement, OperationEntity $operation, ObjectManager $em): CatalogueEntity
    {
        $attribute = (array)$catalogElement->attributes();
        $children = (array)$catalogElement->children();

        $catalogue = new CatalogueEntity(
            $attribute["@attributes"]["id"],
            $children["type"],
            $children["label"],
            $children["speed"],
            intval($children["catalogWidth"]),
            intval($children["catalogHeight"]),
            $operation
            );

        $em->persist($catalogue);

        return $catalogue;
    }

    /**
     * @param SimpleXMLElement $pagesElement
     * @param CatalogueEntity $catalogueEntity
     * @param ObjectManager $em
     * @return PageEntity
     */
    private function GetPage(SimpleXMLElement $pagesElement, CatalogueEntity $catalogueEntity, ObjectManager $em): PageEntity
    {
        $attribute = (array)$pagesElement->attributes();
        $children = (array)$pagesElement->children();


        $page = new PageEntity(
            $attribute["@attributes"]["id"],$children["number"],$catalogueEntity
        );

        $em->persist($page);

        return $page;
    }

    /**
     * @param SimpleXMLElement $producElement
     * @param PageEntity $pageEntity
     * @param ObjectManager $em
     * @return ArticleEntity
     */
    private function GetArtcile(SimpleXMLElement $producElement, PageEntity $pageEntity, ObjectManager $em): ArticleEntity
    {

        $attribute = (array)$producElement->attributes();
        $children = (array)$producElement->children();

        $article = new ArticleEntity(
            $attribute["@attributes"]["id"],
            $children["code"],
            $children["label"],
            $children["description"]);

        $em->persist($article);

        return $article;
    }

    /**
     * @param SimpleXMLElement $producElement
     * @param ArticleEntity $articleEntity
     * @param ObjectManager $em
     * @return void
     */
    private function GetArticleParams(SimpleXMLElement $producElement, ArticleEntity $articleEntity, ObjectManager $em): void
    {
        $children = (array)$producElement->children();

        $origin = array(
            "name" => "origin",
            "value" => $children["origin"]
        );

        $packaging = array(
            "name" => "packaging",
            "value" => $children["packaging"]
        );

        $start_validity_date = array(
            "name" => "start_validity_date",
            "value" => $children["start_validity_date"]
        );

        $end_validity_date = array(
            "name" => "end_validity_date",
            "value" => $children["end_validity_date"]
        );

        $mention = array(
            "name" => "mention",
            "value" => $children["mention"]
        );

        $color = array(
            "name" => "color",
            "value" => $children["color"]
        );

        $params = array($origin, $packaging, $start_validity_date, $end_validity_date, $mention, $color);

        foreach ($params as $param){
            $parameter = new ParametresEntity($param["name"]);
            $em->persist($parameter);
            $value = new ValueParamsEntity($param["value"], $parameter, $articleEntity);
            $em->persist($value);
        }

        $parametre = new ParametresEntity(null);
    }


    private function GetPrixArticle(SimpleXMLElement $productElement,ArticleEntity $article,CatalogueEntity $catalogue,
                                    ObjectManager $em): void
    {

        $chidren = (array)$productElement->children();

        #region Test Value

        $prix = $chidren["price"];
        if(gettype($chidren["price_before_coupon"]) != "object"){
            $prixcoupon = $chidren["price_before_coupon"];
        }else{
            $prixcoupon = null;
        }

        if(gettype($chidren["price_crossed"]) != "object"){
            $price_crossed = $chidren["price_crossed"];
        }else{
            $price_crossed = null;
        }

        if(gettype($chidren["Reduction_euro"]) != "object"){
            $Reduction_euro = $chidren["Reduction_euro"];
        }else{
            $Reduction_euro = null;
        }

        if(gettype($chidren["Reduction_percent"]) != "object"){
            $Reduction_percent = $chidren["Reduction_percent"];
        }else{
            $Reduction_percent = null;
        }

        if(gettype($chidren["Avantage_euro"]) != "object"){
            $Avantage_euro = $chidren["Avantage_euro"];
        }else{
            $Avantage_euro = null;
        }

        if(gettype($chidren["Avantage_percent"]) != "object"){
            $Avantage_percent = $chidren["Avantage_percent"];
        }else{
            $Avantage_percent = null;
        }

        if(gettype($chidren["ecotaxe"]) != "object"){
            $ecotaxe = $chidren["ecotaxe"];
        }else{
            $ecotaxe = null;
        }

        if(gettype($chidren["lowerprice"]) != "object"){
            $lowerprice = $chidren["lowerprice"];
        }else{
            $lowerprice = null;
        }
        #endregion


        $prixArticle = new PrixArticleCategoryEntity(
            $prix,
            $prixcoupon,
            $price_crossed,
            $Reduction_euro,
            $Reduction_percent,
            $Avantage_euro,
            $Avantage_percent,
            $ecotaxe,
            $lowerprice,
            $article,
            $catalogue
        );

        $em->persist($prixArticle);
    }

    private function GetMedia(SimpleXMLElement $productElement,ArticleEntity $article,ObjectManager $em)
    {
        $children = (array)$productElement->children();

        $images = $children["image"];
        $picto = $children["picto"];

        $images = explode(',', $images);

        $imagePath = "/home/user/Documents/Developpement/API_Project_BTS/API/var/MediaImportLisa/";

        foreach ($images as $image){
            $name = explode('/', $image);

            $mediaImage = new MediaEntity("image", $imagePath.$name[0], $name[1]);
            $em->persist($mediaImage);
        }

        $name = explode('/', $picto);

        $pictoMedia = new MediaEntity("picto", $imagePath.$name[0], $name[1]);
        $em->persist($pictoMedia);

    }


    /**
     * @param SimpleXMLElement $zoneElement
     * @param ArticleEntity $article
     * @param ObjectManager $em
     * @return void
     */
    private function GetZoneArticle(SimpleXMLElement $zoneElement,ArticleEntity $article, ObjectManager $em)
    {
        $attribute = (array)$zoneElement->attributes();
        $children = (array)$zoneElement->children();

        $zone = new ZoneEntity(
            $attribute["@attributes"]["type"],
            $children["coordx"],
            $children["coordy"],
            $children["width"],
            $children["height"],
            $article
        );

        $em->persist($zone);

    }

    /**
     * @param SimpleXMLElement $shopElement
     * @param CatalogueEntity $catalogueEntity
     * @param ObjectManager $em
     * @return void
     */
    private function GetShop(SimpleXMLElement $shopElement, CatalogueEntity $catalogueEntity, ObjectManager $em)
    {
        $attribute = (array)$shopElement->attributes();
        $children = (array)$shopElement->children();

        $magasin = new MagasinEntity(
            $attribute["@attributes"]["id"],
            self::UnixTimeStampToDateTime(doubleval($children["startDate"])),
            self::UnixTimeStampToDateTime(doubleval($children["displayStartDate"])),
            self::UnixTimeStampToDateTime(doubleval($children["displayEndDate"])),
            $catalogueEntity
        );

        $em->persist($magasin);
    }

    /// <summary>
    /// Fonction pour transformer un timestamp sous forme de String en DateTime
    /// </summary>
    /// <param name="unixTimeStamp">Date récupérer dans le XML</param>
    /// <returns>un DateTime</returns>
    /**
     * @param float $unixTimeStamp
     * @return DateTime
     */
    private static function UnixTimeStampToDateTime(float $unixTimeStamp): \DateTime
    {
        $stringDate = date("Y-m-d H:i:s", $unixTimeStamp);
        $date = \DateTime::createFromFormat("Y-m-d H:i:s", $stringDate);
        return $date;
    }

}

