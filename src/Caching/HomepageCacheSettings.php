<?php
namespace Kiom\Caching;

use IO\Services\ContentCaching\Contracts\CachingSettings;
use Plenty\Plugin\ConfigRepository;

/**
 * Created by ptopczewski, 14.06.17 16:01
 * Class HomepageCacheSettings
 * @package Ceres\Caching
 */
class HomepageCacheSettings implements CachingSettings
{
    /**
     * @var ConfigRepository
     */
    private $configRepository;

    /**
     * HomepageCacheSettings constructor.
     * @param ConfigRepository $configRepository
     */
    public function __construct(ConfigRepository $configRepository)
    {
        $this->configRepository = $configRepository;
    }

    /**
     * @return bool
     */
    public function containsItems(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return [
            'name' => $this->configRepository->get('Ceres.item.name'),
            'sliderItemId1' => $this->configRepository->get('Kiom.homepage.sliderItemId1'),
            'sliderItemId2' => $this->configRepository->get('Kiom.homepage.sliderItemId2'),
            'sliderItemId3' => $this->configRepository->get('Kiom.homepage.sliderItemId3'),
            'sliderImageUrl1' => $this->configRepository->get('Kiom.homepage.sliderImageUrl1'),
            'sliderImageUrl2' => $this->configRepository->get('Kiom.homepage.sliderImageUrl2'),
            'sliderImageUrl3' => $this->configRepository->get('Kiom.homepage.sliderImageUrl3'),
            'heroExtraItemId1' => $this->configRepository->get('Kiom.homepage.heroExtraItemId1'),
            'heroExtraItemId2' => $this->configRepository->get('Kiom.homepage.heroExtraItemId2'),
            'heroExtraImageUrl1' => $this->configRepository->get('Kiom.homepage.heroExtraImageUrl1'),
            'heroExtraImageUrl2' => $this->configRepository->get('Kiom.homepage.heroExtraImageUrl2'),
            'homepageCategory1' => $this->configRepository->get('Kiom.homepage.homepageCategory1'),
            'homepageCategory2' => $this->configRepository->get('Kiom.homepage.homepageCategory2'),
            'homepageCategory3' => $this->configRepository->get('Kiom.homepage.homepageCategory3'),
            'homepageCategory4' => $this->configRepository->get('Kiom.homepage.homepageCategory4'),
            'homepageCategory5' => $this->configRepository->get('Kiom.homepage.homepageCategory5'),
            'homepageCategory6' => $this->configRepository->get('Kiom.homepage.homepageCategory6'),
            'variation_show_type' => $this->configRepository->get('Kiom.homepage.variation_show_type'),
        ];

    }
}
