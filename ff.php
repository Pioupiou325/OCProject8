if (filter_input_array(type: INPUT_POST)) {
            $this->request['post'] = Utils::cleanArray(array: filter_input_array(type: INPUT_POST));
        }

    
    public static function cleanArray(array $array): array
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                static::cleanArray($value);
            } else {
                if (is_string($key)) {
                    unset($array[$key]);
                    $key = static::cleanString($key);
                    $array[$key] = $value;
                }
                if (is_string($value)) {
                    $array[$key] = static::cleanString($value);
                }
            }
        }
        return $array;
    }

    /**
     * @param string $string
     * @return string
     */
    public static function cleanString(string $string): string
    {
        $string = trim($string);
        return htmlspecialchars($string, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
    }