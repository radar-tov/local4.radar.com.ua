<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Article;
use App\Models\Page;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Created by Igor Mazur
 * Date: 07.09.15 0:31
 */
class InformationController extends BaseController
{
	public function getPage(Article $article)
	{
		$articles = $article->show()->where('published_at','<=', date('Y-m-d'))->orderBy('published_at','desc')->paginate(10);
		return view('frontend.page', compact('articles'));
	}

	public function getArticle(Article $article, $articleId, $articleSlug)
	{
		$article = $article->show()->findOrFail($articleId);

		if( $article->slug === $articleSlug ) {
			view()->share('MetaTitle',$article->meta_title);
			view()->share('MetaDescription',$article->meta_description);
			view()->share('MetaKeywords',$article->meta_keywords);

            $date = new \DateTime($article->updated_at);
            return \Response::view('frontend.single-post',compact('article'))
                ->header( 'Last-Modified', $date->format("D, d M Y H:i:s").' GMT');

			//return view('frontend.single-post',compact('article'));
		}

		throw new ModelNotFoundException('404 Error!');

	}

	public static function sitemapStati()
	{
		return Article::where('published_at','<=', date('Y-m-d'))->where('sitemap', 1)->get();
	}

	public function getSitemapStati()
	{
        $content = \Storage::disk('xml')->get('sitemap_stati.xml');
        return response($content, 200)->header('Content-type', 'text/xml');
	}
}