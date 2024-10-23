<?php
class Weka {
    private $wekaPath;

    public function __construct($wekaPath) {
        $this->wekaPath = $wekaPath;
    }

    public function classify($modelFile, $dataFile) {
        // Create the command to run Weka
        $command = "java -Xmx1024m -cp \"$this->wekaPath\" weka.classifiers.trees.J48 -l \"$modelFile\" -T \"$dataFile\" -p 0";

        // Execute the command and capture the output
        $output = [];
        $returnVar = 0;
        exec($command, $output, $returnVar);

        // Check for errors in execution
        if ($returnVar !== 0) {
            throw new Exception("Error executing Weka: " . implode("\n", $output));
        }

        // Parse the output to get the predictions
        return $this->parseOutput($output);
    }

    private function parseOutput($output) {
        $results = [];
        foreach ($output as $line) {
            if (preg_match('/^[0-9]+: (.*)$/', $line, $matches)) {
                $results[] = trim($matches[1]);
            }
        }
        return $results;
    }
}
