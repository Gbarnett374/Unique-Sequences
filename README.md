# Unique-Sequences

## Usage 
####Requires PHP >= 5.4 

####Tested with PHP 5.5.3

#### From the project folder run:
`php app.php < example.txt`

## Output 

### This will output 2 files in /tmp.
- unique.txt - All unique combinations in alphabetical order.
- fullwords.txt - The original words that the unqiue 4 letter sequence came from. They are in the same order as the unique sequences from unique.txt. 

### Example output: 
````
unique.txt:

bicy
book
ecyc
icyc
recy

fullwords.txt:

bicycle
book
recycle
bicycle
recycle

Note : 'cycl' and 'ycle' do not show up, because they each appear in more than one word.
````

