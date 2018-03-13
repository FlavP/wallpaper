<?php

namespace AppBundle\Command;

use AppBundle\Entity\Wallpaper;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Helper\Table;

class SetupWallpapersCommand extends Command
{
    /**
     * @var string
     */
    private $rootDir;
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(string $rootDir, EntityManagerInterface $em){
        parent::__construct();
        $this->rootDir = $rootDir;
        $this->em = $em;
    }

    protected function configure()
    {
        $this
            ->setName('app:setup-wallpapers')
            ->setDescription('Grabs all local wallpapers and creates a Wallpaper entity for each one')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $inputOutput = new SymfonyStyle($input, $output);
        $wallpapers = glob($this->rootDir . '/web/images/*.*');
        $wallCount = count($wallpapers);
        $inputOutput->title("Importing wallpapers");
        $inputOutput->progressStart($wallCount);

        $fileNames = [];
        foreach($wallpapers as $wallpaper){

            [
                'basename' => $filename,
                'filename' => $slug,
            ] = pathinfo($wallpaper);
            [
                0 => $height,
                1 => $width,
            ] = getimagesize($wallpaper);
            //exit(\Doctrine\Common\Util\Debug::dump(getimagesize($wallpaper)));
            $wp = (new Wallpaper())
                ->setFilename($filename)
                ->setSlug($slug)
                ->setHeight($height)
                ->setWidth($width)
            ;
            $this->em->persist($wp);
            $inputOutput->progressAdvance();
            $fileNames[] = $filename;
        }
        $this->em->flush();
        $inputOutput->progressFinish();
        $table = new Table($output);
        $table
            ->setHeaders(['Filename'])
            ->setRows([$fileNames])
            ;
        $table->render();
        $inputOutput->success(sprintf("We added %d wallpapers", $wallCount));
    }

}
