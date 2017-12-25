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
use App\Entity\OperationEntity;
use App\Entity\PageEntity;
use App\Entity\ParametresEntity;
use App\Entity\ZoneEntity;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * Class ImportXmlController
 * @package App\Controller
 */
class ImportXmlController
{

    /**
     * @var string
     */
    private $dirImportXml = "/home/user/Documents/Developpement/API_Project_BTS/ImportLisa/";

    //Entrez dans le systeme

    /**
     *
     */
    public function main(): void
    {
        try{
            if($dirExist = is_dir($this->dirImportXml)){
                if($handle = scandir($this->dirImportXml)){
                   foreach ($handle as $dir){
                       $dirImport = scandir($this->dirImportXml.$dir);
                       foreach ($dirImport as $item){
                           $info = new \SplFileInfo($item);
                           if($info->getExtension() == "xml"){
                               $this->ImportXmlFile($this->dirImportXml.$dir.DIRECTORY_SEPARATOR.$item);
                           }
                       }
                   }
                   die();
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
                if($xmlfile = simplexml_load_file($filePath, "SimpleXMLElement")){
                    foreach ($xmlfile->operation as $operationElement){
                        $operation = $this->GetOperation($operationElement);

                        foreach ($operationElement->catalog as $catalogElement){

                            $catalogue = $this->GetCatalogue($catalogElement);
                            foreach ($catalogElement->pages->page as $pageElement){
                                $page = $this->GetPage($pageElement);
                                foreach ($pageElement->products->product as $producElement){
                                    $article = $this->GetArtcile($producElement);
                                    $params = $this->GetArticleParams($producElement);

                                    foreach ($producElement->zones->zone as $zoneElement){
                                        $zone = $this->GetZoneArticle($zoneElement, $article);
                                    }
                                }
                            }

                            foreach ($catalogElement->shops->shop as $shopElement){
                                $shop = $this->GetShop($shopElement);
                            }
                        }
                    }
                    //var_dump($xmlfile->getName("shop"));
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
     * @param $operationElement
     * @return OperationEntity
     */
    private function GetOperation($operationElement): OperationEntity
        {
            $operation = new OperationEntity();
            return $operation;
        }


    /**
     * @param $catalogElement
     * @return CatalogueEntity
     */
    private function GetCatalogue($catalogElement): CatalogueEntity
    {
        $catalogue = new CatalogueEntity();
        return $catalogue;
    }

    /**
     * @param $pagesElement
     * @return PageEntity
     */
    private function GetPage($pagesElement): PageEntity
    {
        $page = new PageEntity();
        return $page;
    }

    /**
     * @param $producElement
     * @return ArticleEntity
     */
    private function GetArtcile($producElement): ArticleEntity
    {
        $article = new ArticleEntity();
        return $article;
    }

    /**
     * @param $producElement
     * @return ParametresEntity
     */
    private function GetArticleParams($producElement): ParametresEntity
    {
        $parametre = new ParametresEntity();
        return $parametre;
    }

    /**
     * @param $zoneElement
     * @param $article
     * @return ZoneEntity
     */
    private function GetZoneArticle($zoneElement, $article): ZoneEntity
    {

        $zone = new ZoneEntity();
        return $zone;
    }

    /**
     * @param $shopElement
     * @return MagasinEntity
     */
    private function GetShop($shopElement): MagasinEntity
    {
        $magasin = new MagasinEntity();
        return $magasin;
    }
    /// <summary>
    /// Fonction pour transformer un Date et DateTime
    /// </summary>
    /// <param name="unixTimeStamp">Date récupérer dans le XML</param>
    /// <returns>un DateTime</returns>
    private static function UnixTimeStampToDateTime(double $unixTimeStamp)
    {
        return new DateTime(1970, 1, 1, 0, 0, 0, 0, DateTimeKind.Utc).AddSeconds(unixTimeStamp).ToLocalTime();
    }

}

