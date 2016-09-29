<?php

namespace App\Services;
use Illuminate\Pagination\BootstrapThreePresenter;


/**
 * Created by Igor Mazur
 * Date: 05.07.15 21:51
 */
class CustomPagination extends BootstrapThreePresenter
{



	public function render()
	{
		if ($this->hasPages()) {
			return sprintf(
				'<ul class="pagination right no-margin">%s %s %s</ul>',
				$this->getPreviousButton(),
				$this->getLinks(),
				$this->getNextButton()
			);
		}

		return '';
	}


	public function getPreviousButton($text = '<i class="mdi-navigation-chevron-left"></i>')
	{

		// If the current page is less than or equal to one, it means we can't go any
		// further back in the pages, so we will render a disabled previous button
		// when that is the case. Otherwise, we will give it an active "status".
		if ($this->paginator->currentPage() <= 1)
		{
			return $this->getDisabledTextWrapper($text);
		}

		$previousPage = $this->paginator->currentPage() - 1;

		$url = $this->paginator->url(
			$previousPage
		);

		return '<li class="pg" rel="'.$previousPage.'"><a href="'.$url.'"><i class="mdi-navigation-chevron-left"></i></a></li>';
		//return $this->getPageLinkWrapper($url, $text, $previousPage);

	}

	public function getNextButton($text = '<i class="mdi-navigation-chevron-right"></i>')
	{
		// If the current page is greater than or equal to the last page, it means we
		// can't go any further into the pages, as we're already on this last page
		// that is available, so we will make it the "next" link style disabled.

		if ( ! $this->paginator->hasMorePages())
		{
			return $this->getDisabledTextWrapper($text);
		}
		$page = $this->paginator->currentPage() + 1 ;

		$url = $this->paginator->url($page);

		return '<li class="">
					<a href="'.$url.'" class="pg" rel="'.$page.'">'.$text.'</a>
				</li>';

		//		return $this->getPageLinkWrapper($url, $text, 'next');
	}

	public function getAvailablePageWrapper($url, $page, $rel = null)
	{
		return '<li class=""><a class="pg"  rel="'.$rel.'"  href="'.$url.'">'.$page.'</a></li>';
	}

}