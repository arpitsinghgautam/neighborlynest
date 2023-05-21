<?php

// Get the OpenAI API key
$open_ai_key = getenv('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');

// Create an OpenAI API client
$open_ai = new OpenAi\OpenAi($open_ai_key);

// Create a chat request function
function createChatRequest($name, $businessName, $businessTagline, $businessDescription, $itemsSold) {
  return [
    'model' => 'gpt-3.5-turbo',
    'messages' => [
      [
        "role" => "system",
        "content" => "Hello, $name. How can I help you with your business, $businessName?"
      ],
      [
        "role" => "user",
        "content" => "I'm looking for information on $businessTagline."
      ]
    ],
    'temperature' => 1.0,
    'max_tokens' => 4000,
    'frequency_penalty' => 0,
    'presence_penalty' => 0,
  ];
}

// Create a chat function
function chat($name, $businessName, $businessTagline, $businessDescription, $itemsSold) {
  // Create a chat request
  $chatRequest = createChatRequest($name, $businessName, $businessTagline, $businessDescription, $itemsSold);

  // Send the chat request
  $chatResponse = $open_ai->chat($chatRequest);

  // Get the response message
  $responseMessage = $chatResponse->choices[0]->message->content;

  // Display the response message
  echo $responseMessage;
}

// When the form is submitted, call the chat function
if (isset($_POST['name']) && isset($_POST['business_name']) && isset($_POST['business_tagline']) && isset($_POST['business_description']) && isset($_POST['items_sold'])) {
  $name = $_POST['name'];
  $businessName = $_POST['business_name'];
  $businessTagline = $_POST['business_tagline'];
  $businessDescription = $_POST['business_description'];
  $itemsSold = $_POST['items_sold'];

  chat($name, $businessName, $businessTagline, $businessDescription, $itemsSold);
}